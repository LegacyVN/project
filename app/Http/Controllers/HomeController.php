<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Gallery;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Photo;
use App\Models\Products;
use App\Models\Rating;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail; // Import the Mailable

use Illuminate\Support\Facades\Http;


function ifExistsArray($array, $str)
{
    //check if $str exists in $array
    $test = false;
    for ($i = 0; $i < count($array); $i++) {
        if ($str == $array[$i]) {
            $test = true;
            break;
        }
    }
    return $test;
}

function ifExistsCart($cart, $id)
{
    //check if cart exists
    $test = false;
    for ($i = 0; $i < count($cart); $i++) {
        if ($id == $cart[$i]['id']) {
            $test = true;
            break;
        }
    }
    return $test;
}

function debug_to_console($data)
{
    //help debugging to console in controller if needed
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

function count_products($products, $id)
{
    //Calculate total quantity of each products
    $total = 0;
    foreach ($products as $product) {
        if ($product->product_id == $id) {
            $total += $product->quantity;
            // $total++;
        }
    }
    return $total;
}


class HomeController extends Controller
{
    public function index()
    {
        $orders = Order::where('status', 0)->get();
        $totalorders = Order::count();
        $totalUsers = User::count();
        $totalCheckedOrders = Order::where('status', 1)->count();
        $totalproducts = Products::count();
        $totalUncheckedOrders = Order::where('status', 0)->count();


        return view('Admin.dashboard.index', [
            'orders' => $orders,
            'totalorders' => $totalorders,
            'totalUsers' => $totalUsers,
            'totalCheckedOrders' => $totalCheckedOrders,
            'totalproducts' => $totalproducts,
            'totalUncheckedOrders' => $totalUncheckedOrders,
        ]);
    }

    //------------Function for index.blade.php-------------
    public function home()
    {

        try{
            session()->get('cart', []);
            // session()->flush();            

        //Get products for deal.blade.php
        $dis_products = Products::where('discount_price', '>', 0.00)->get();
        $new_products =  Products::orderBy("created_at", "desc")->take(8)->get();
        $best_products = Products::with("order_details:detail_id,product_id")->get();
        
        $order_details = OrderDetail::get();
        $reviews = Rating::with(['user:id,name', 'product:id,title,category_id'])->whereBetween('rate_score', ["4", "5"])->get();
        

        $data = [
            "products" => Products::get(),
            "categories" => Categories::get(),
            "order_details" => OrderDetail::get(),
            "gallery" => Gallery::get()
        ];
        if ($dis_products->isNotEmpty()) {
            $data["dis_products"] = $dis_products;
        }
       
        if ($best_products->isNotEmpty()) {
            $products_best = collect(); //create an empty collection
            foreach ($best_products as $best_product) {
                $quantity_sold = count_products($order_details, $best_product->id);
                if ($quantity_sold >= 5) {
                    $best_product->quantity_sold = $quantity_sold; 
                    $products_best->push($best_product); //valid Products object will be pushed
                }                
            }
            // debug_to_console($products_best);
            $data['best_products'] = $products_best->take(8);
        }

        if ($new_products->isNotEmpty()) {
            $data["new_products"] = $new_products;
        }

        if ($reviews->isNotEmpty()) {
            $data["reviews"] = $reviews;
        }

        return view("home/index")->with($data);
        }
        catch(Exception $ex){

            return view("home/index")->with("error", "Something is wrong");
        }
        
    }

    //Executed when user use Contact Us form
    public function contactUs(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
            'h-captcha-response' => 'required|string',
        ]);
    
        // Verify the hCaptcha response
        $response = Http::asForm()->post('https://hcaptcha.com/siteverify', [
            'secret' => env('HCAPTCHA_SECRET_KEY'),
            'response' => $request->input('h-captcha-response'),
        ]);
    
        $responseData = $response->json();
    
        if (!$responseData['success']) {
            return redirect()->to('/home/index' . '/#nav-contacts')->with('msg', 'Please complete the CAPTCHA.');
        }
    
        // Prepare the data for the email
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ];
    
        try {
            // Send the email
            Mail::to(env('MAIL_FROM_ADDRESS'))->send(new ContactFormMail($data));
    
            // Return success message and redirect back
            return redirect()->to('/home/index' . '/#nav-contacts')->with('msg', 'Your message has been sent!');
        } catch (Exception $e) {
            // Handle the exception
            return redirect()->to('/home/index' . '/#nav-contacts')->with('msg', 'Failed to send message. Please try again later.');
        }
    }

    // ------Functions related to cart.blade.php-----------
    //Excecuted when add product to cart
    public function addToCart($id, Request $request)
    {
        try{
            $product = Products::find($id);

            //Get cart from session
            $cart = session()->get('cart', []);
            $form_quantity = (int)$request->post("form-quantity");
    
            //If cart empty, add the id and default quantity 1 to the cart session
            if (empty($cart)) {
                $cart[] = [
                    'id' => $id,
                    'quantity' => 1
                ];
            } else {
                //If cart not empty, check for product's existence in cart
                if (ifExistsCart($cart, $id)) {
                    //If product exists in cart then increase the quantity
                    foreach ($cart as &$item) { //&$item means it will modify the $item in $cart, not just using the value
                        if ($item['id'] == $id) {
                            $total_quantity = $form_quantity + $item['quantity'];
                            //form_quantity is the quantity input box in productDetails.blade
                            if ($form_quantity != NULL && $total_quantity <= $product->quantity) {
                                $item['quantity'] = (int)$item['quantity'] + $form_quantity;
                                break;
                            } else if ($form_quantity == NULL && ($item['quantity'] + 1) <= $product->quantity) {
                                $item['quantity'] = (int)$item['quantity'] + 1;
                                break;
                            } else {
                                return redirect()->back()->with("error", "The requested quantity exceeds the available stock for this product");
                            }
                        }
                    }
                    unset($item); //unset afterward
                } else {
                    //If product doesn't exists in cart then add new product as usual
                    if ($product->quantity >= 1) {
                        $cart[] = [
                            'id' => $id,
                            'quantity' => 1
                        ];
                    }else{
                        
                        return redirect()->back()->with("error", "The requested quantity exceeds the available stock for this product");
                    }
                }
            }
    
            //Update the cart session
            $request->session()->put('cart', $cart);
            return redirect()->back()->with("success", "Added To Cart!"); 
        }
        catch(Exception $ex){
            return redirect()->back()->with("error", "Failed To Add Cart");
        }
        
    }

    //Executed when opening cart.blade.php
    public function cart(Request $request)
    {
     
            //Get the cart
        $cart = session()->get('cart', []);
        //Check if cart is empty or not
        if ($cart != NULL) {
            $products = [];
            $quantity = [];
            $final_prices = [];
            $subtotal = 0;
            foreach ($cart as $item) {
                $products[] = Products::find($item['id']);
                $quantity[] = $item['quantity'];
                $price = (float)Products::where("id", $item['id'])->pluck("price")->first();
                $percent = (float)Products::where("id", $item['id'])->pluck("discount_price")->first();
                $discount_price = round($price - ($price * $percent), 2);

                if ($percent > 0.00) {
                    $final_prices[] = $discount_price;
                    $subtotal = $subtotal + $discount_price * $item['quantity'];
                } else {
                    $final_prices[] = $price;
                    $subtotal = $subtotal + $price * $item['quantity'];
                }
            }

            $data = [
                "products" => $products,
                "quantity" => $quantity,
                "subtotal" => (float)$subtotal,
                "final_prices" => $final_prices
            ];

            return view("home/cart")->with($data);
        } else {
            return view("home/cart");
        }
       
        
    }

    //Executed when changing the quantity of product in the cart
    public function updateCart(Request $request)
    {
        // Validate the request
        $request->validate([
            'id' => 'required|integer',
            'quantity' => 'required|integer|min:1'
        ]);

        //Get the cart from session
        $cart = session()->get('cart', []);


        foreach ($cart as &$item) {
            if ($item['id'] == $request->id) {
                $item['quantity'] = $request->quantity;
                break;
            }
        }

        session()->put('cart', $cart);

        return response()->json([
            'success' => true,
            'cart' => $cart
        ]);
    }

    //Executed when delete product in cart
    public function deleteCart($prod_id)
    {
        try{
            $cart = session()->get('cart', []);
            foreach ($cart as $key => $item) {
                if ($item['id'] == $prod_id) {
                    unset($cart[$key]);
                    break;
                }
            }
            session()->put('cart', $cart);
            return redirect()->back();
        }
        catch(Exception $ex){
            return redirect()->back()->with("error", "Failed To Delete");
        }
       
    }

    //Executed when user check out the Cart
    public function order()
    {
        try{
            $cart = session()->get('cart', []);
        if (is_null($cart) == false || $cart != '') {
            $order = [
                'user_id' => Auth::id(),
                'created_at' => date('Y-m-d H:i:s'),
                'checked_by' => ''
            ];
            Order::create($order);
            $latest = Order::latest()->first();
            // var_dump($latest->order_id);
            foreach ($cart as $item) {
                $product = Products::find($item['id']);
                $detail = [
                    'order_id' => $latest->order_id,
                    'product_id' => $product->id,
                    'price' => $product->price,
                    'quantity' => $item['quantity']
                ];
                OrderDetail::create($detail);
            }
            session()->put("cart", []);
        }

        return redirect("/home");
        }
        catch(Exception $ex){
            return redirect()->back()->with("error", "Failed To Checkout");
        }
        
    }

    // ------Functions related to productDetails.blade.php-----------
    public function productDetails($id, $cat_id)
    {
        try {
            //Current Logged In ID
            $auth_id = Auth::id();
            //Related to Reviews tab
            $reviews = Rating::with('user:id,name')->where('product_id', $id)->get();
            $reviews_avg = 0.0;
            /*Five zeroes for from the score from 1 to 5.
            $review_overview[0] is the number of time each score is given
            $review_overview[1] is percentage of each score compare to total number of time scored
            */
            $reviews_overview = [[0, 0, 0, 0, 0], [0, 0, 0, 0, 0]];
            $orders_detail = OrderDetail::with("order")->where('product_id', $id)->get();

            $data = [
                "product" => Products::with(['category', 'ratings'])->find($id),
                "rel_products" => Products::where("id", "!=", $id)->where("category_id", $cat_id)->get(),
                "photo" => Photo::where("product_id", $id)->get()
            ];

            //review validity for Logged In User
            if ($auth_id) {
                $review_validity = true;
                foreach ($reviews as $review) {
                    if ($review->checkUser($review->user->id)) {
                        $review_validity = false;
                        break;
                    }
                }
                $data["review_validity"] = $review_validity;
            }

            //Available reviews for a product
            if ($reviews->isNotEmpty()) {
                $data["reviews"] = $reviews;
            };

            //Average Review Score (under product's title) and Review Overview board (Review tab)
            if (count($reviews) > 1) {
                //If more than one review is avalable
                for ($i = 0; $i < count($reviews); $i++) {
                    //get rate score from database and sum it up
                    $rate_score = $reviews[$i]['rate_score'];
                    $reviews_avg += $rate_score;
                    //count the number of time each scores are given
                    $reviews_overview[0][$rate_score - 1] += 1;
                }

                //calculate "reviews_overview"
                for ($i = 0; $i < 5; $i++) {
                    $reviews_overview[1][$i] =  round($reviews_overview[0][$i] / count($reviews), 2) * 100;
                }
                //calculate "reviews_avg"
                $reviews_avg = round((float)$reviews_avg / (float)count($reviews), 2);


                //put "reviews_avg" and "reviews_overview" into $data
                if (strlen((string)$reviews_avg) > 1) {
                    $data["reviews_avg"] = (string)$reviews_avg;
                } else {
                    $data["reviews_avg"] = (string)$reviews_avg . ".0"; //Make sure even interger appear as .0
                }
                $data["reviews_overview"] = $reviews_overview;
            } else if (count($reviews) == 1) {
                //If only one review is available then do the below
                //calculate "reviews_avg"
                $reviews_avg = (string)$reviews[0]['rate_score'] . ".0";

                //calculate "reviews_overview"
                $reviews_overview[0][$reviews_avg - 1] += 1;
                $reviews_overview[1][$reviews_avg - 1] = 100;

                //put "reviews_avg" and "reviews_overview" into $data
                $data["reviews_avg"] = $reviews_avg;
                $data["reviews_overview"] = $reviews_overview;
            } else {
                //If no review at all
                //put "reviews_avg" and "reviews_overview" into $data
                $data["reviews_avg"] = (string)$reviews_avg . ".0";
                $data["reviews_overview"] = $reviews_overview;
            }

            if ($orders_detail->isNotEmpty()) {
                $data["orders_detail"] = $orders_detail;
            };

            return view("home/productDetails")->with($data);
        } catch (Exception $ex) {

            return view("home/index");
        }
    }

    //Executed when rating the products
    public function rate(Request $request, $user_id, $product_id)
    {
        try {
            $rate = [
                'rate_comment' => $request->post("rate_comment"),
                'rate_score' => $request->post("rate_score"),
                'user_id' => $user_id,
                'product_id' => $product_id
            ];
            Rating::create($rate);
            return redirect()->back();
        } catch (Exception $ex) {

            return redirect()->back();
        }
    }

    // ------Functions related to shop.blade.php-----------
    public function browseProducts()
    {
        try{
            $data = [
                "products" => Products::get(),
                "categories" => Categories::get()
            ];
            return view("home/shop")->with($data);
        }
        catch(Exception $ex){
            return redirect()->back()->with("error", "Something is wrong");
        }       
     
    }
    //Executed when using filter and sort in shop.blade.php
    public function filter(Request $request)
    {
        try {
            $request->validate([
                'filter-min' => 'nullable|string',
                'filter-max' => 'nullable|string',
                'filter-status' => 'nullable|boolean'
            ]);

            $min = $request->post('filter-min', null);
            $max = $request->post('filter-max', null);
            $status = $request->post('filter-status', null);
            $sortId = $request->post('filter-sort');

            $category = $request->post('filter-cat');
            $result = Products::query(); // Start the query builder         
            $data = [];

            // Filter by minimum price
            if (!is_null($min)) {
                $result->whereRaw('price - (price * discount_price) >= ?', [$min]);
            }

            // Filter by maximum price
            if (!is_null($max)) {
                $result->whereRaw('price - (price * discount_price) <= ?', [$max]);
            }

            // Filter by status
            if (!is_null($status)) {
                if ($status == "1") {
                    $result->where('quantity', ">=", "1");
                }
            }

            if ($sortId == "1") {
                $result->orderBy('title');
            } elseif ($sortId == "2") {
                $result->orderBy('title', 'desc');
            } elseif ($sortId == "3") {
                $result->orderBy('price');
            } elseif ($sortId == "4") {
                $result->orderBy('price', 'desc');
            }

            if ($category != "0") {
                $result->where('category_id', $category);
            }

            $products = $result->get();

            $data = [
                'products' => $products,
                'categories' => Categories::get()
            ];

            return redirect()->to('/home/browse-products')->withInput()->with($data);
        } catch (Exception $exception) {

            return redirect()->back();
        }
    }

    

    public function product_details($id)
    {
        $data = Products::find($id);

        $products = Products::where('category_id', $data->category_id)->take(4)->get();

        return view('home.product_details', compact('data'), compact('products'));
    }
}
