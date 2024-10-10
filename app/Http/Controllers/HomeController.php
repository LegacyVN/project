<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Contact;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Photo;
use App\Models\Products;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

function ifExistsArray($array, $str)
{
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
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}
class HomeController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index');
    }


    public function home()
    {

        session()->get('cart', []);
        $cart = session()->get('cart', []);
        debug_to_console(count($cart));
        // session()->flush();

        //New Products
        $sevenDaysAgo = date('Y-m-d H:i:s', strtotime('-7 days'));
        $now = date('Y-m-d H:i:s');

        $data = [
            "products" => Products::get(),
            "dis_products" => Products::where('discount_price', '>', 0.00)->get(),
            "new_products" => Products::whereBetween('created_at', [$sevenDaysAgo, $now])->get(),
            "categories" => Categories::get()
        ];
        return view("home/index")->with($data);
    }

    public function addToCart($id, Request $request)
    {
        $cart = session()->get('cart', []);
        $form_quantity = (int)$request->post("form-quantity");
        debug_to_console($form_quantity);
      
        if (empty($cart)) {
            $cart[] = [
                'id' => $id,
                'quantity' => 1
            ];
        } else {
            if (ifExistsCart($cart, $id)) {        
                foreach ($cart as &$item) {
                    if ($item['id'] == $id) {
                        if ($form_quantity != NULL) {
                            $item['quantity'] = (int)$item['quantity'] + $form_quantity;
                            break;
                        } else {
                            $item['quantity'] = (int)$item['quantity'] + 1;
                            break;
                        }
                    }
                }
                unset($item);
            } else {
                $cart[] = [
                    'id' => $id,
                    'quantity' => 1
                ];
            }
        }

        $request->session()->put('cart', $cart);
        return redirect()->to('/home/index'.'/#nav-products')->with('success', 'Product Added');
    }


    public function cart(Request $request)
    {
        // $cart = $request->session()->get('cart');
        $cart = session()->get('cart', []);
        // debug_to_console($cart[0]['quantity']);
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
            // print_r($data["final_prices"]);

            // print_r($data["quantity"]);
            // print_r(count($data["products"]));
            return view("home/cart")->with($data);
        } else {
            return view("home/cart");
        }
    }

    public function updateCart(Request $request)
    {
        // Validate the request
        $request->validate([
            'id' => 'required|integer',
            'quantity' => 'required|integer|min:1'
        ]);

        // Get the current cart from the session
        $cart = session()->get('cart', []);

        // Find the product in the cart
        foreach ($cart as &$item) {
            if ($item['id'] == $request->id) {
                $item['quantity'] = $request->quantity;
                break;
            }
        }

        // Store the updated cart back in the session
        session()->put('cart', $cart);

        // Return a response
        return response()->json([
            'success' => true,
            'cart' => $cart
        ]);
    }


    public function productDetails($id, $cat_id)
    {
        try {
            // $product = Products::find($id);
           $data = [
                    "product" => Products::with("category")->find($id),
                    "rel_products" => Products::where("id", "!=", $id)->where("category_id", $cat_id)->get(),
                    "photo" => Photo::where("product_id", $id)->get()                
                ];
           
            if (!$data["product"]) {
                // Handle the case when the product is not found
                return redirect()->route("home/index")->with('error', 'Product not found');
            }
            // print_r($product);
            return view("home/productDetails")->with($data);
        } catch (Exception $ex) {
            return view("home/index");
        }
    }

    public function order()
    {
        $cart = session()->get('cart', []);
        if (is_null($cart) == false || $cart != '') {
            $order = [
                'user_id' => Auth::id(),
                'order_date' => date('Y-m-d H:i:s')
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

        return redirect("/home")->with('success', 'Order Completed');
    }

    public function contactUs(Request $request){
        
        $user_id = Auth::id();
        if(is_null($user_id)){
            $contact = [
                'contact_name' => $request->post('name'),
                'contact_email' => $request->post('email'),
                'contact_comment' => $request->post('message')
            ];
        }else{
            $contact = [
                'user_id' => $user_id,
                'contact_name' => $request->post('name'),
                'contact_email' => $request->post('email'),
                'contact_comment' => $request->post('message')
            ];
        }
        Contact::create($contact);
        return redirect()->back();
    }

    public function product_details($id)
    {
        $data = Products::find($id);

        $products = Products::where('category_id', $data->category_id)->take(4)->get();

        return view('home.product_details', compact('data'), compact('products'));
    }
}
