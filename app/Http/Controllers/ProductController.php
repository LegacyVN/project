<?php


namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Photo;
use App\Models\Products;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /// Product

    public function index()
    {
        $categories = Categories::all();
        $products = Products::paginate(10);
        $totalproducts = Products::count();

        return view('Admin/products/index', compact('categories', 'products', 'totalproducts'));
    }


    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $products = Products::where('title', 'like', "%{$keyword}%")->paginate(10);

        return view('Admin/products/index', compact('products'))->with('totalproducts', $products->total());
    }

    public function create()
    {
        $categories = Categories::all();
        return view('Admin/products/create', compact('categories'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric',
            'category_id' => 'required|integer|exists:categories,id',
            'quantity' => 'required|integer',
            'discount_price' => 'required|numeric|min:0.00|max:1.00',
            'status' => 'required|boolean',
        ]);

        $productData = $request->only(['title', 'description', 'price', 'category_id', 'quantity', 'discount_price', 'status']);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = public_path('products');


            if (!file_exists($imagePath)) {
                mkdir($imagePath, 0777, true);
            }


            $image->move($imagePath, $imageName);


            $productData['image'] = $imageName;
        } else {
            return redirect()->back()->with('error', 'Cannot upload image');
        }


        $product = Products::create($productData);


        if ($product) {
            $photo = new Photo();
            $photo->photo_name = $imageName;
            $photo->product_id = $product->id;
            $photo->save();

            return redirect()->route('products.index')->with('success', 'Products and Images has been uploaded!');
        } else {
            return redirect()->back()->with('error', 'Error occured when uploading image.');
        }
    }




    public function edit($id)
    {

        $product = Products::findOrFail($id);

        return view('Admin.products.edit', compact('product'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'discount_price' => 'nullable|numeric',
            'status' => 'required|in:0,1',
        ]);


        $product = Products::findOrFail($id);

        $product->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'image' => $request->input('image'),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity'),
            'discount_price' => $request->input('discount_price'),
            'status' => $request->input('status'),
        ]);


        return redirect()->route('products.index')->with('msg', 'Product has been updated!');
    }

    public function delete($id)
    {
        // Find the product by ID or fail
        $product = Products::findOrFail($id);

        // Get all photos associated with the product using the relationship
        $photos = $product->photos;

        // Loop through each photo to delete the image file and the photo record
        foreach ($photos as $photo) {
            $image_path = public_path('products/' . $photo->photo_name);

            // Check if the image file exists before attempting to delete it
            if (file_exists($image_path)) {
                unlink($image_path); // Delete the photo file from the folder
            }

            // Delete the photo from the database
            $photo->delete();
        }

        // Delete the main product image file if it exists
        $product_image_path = public_path('products/' . $product->image);
        if ($product->image && file_exists($product_image_path)) {
            unlink($product_image_path); // Delete the main product image
        }

        // Finally, delete the product
        $product->delete();

        // Optionally add a success message using toastr
        toastr()->closeButton()->addSuccess('Product and associated photos deleted successfully');

        // Redirect back to the product listing page
        return redirect()->back();
    }



    public function createPhoto($productId)
    {
        $product = Products::findOrFail($productId);
        return view('Admin/products/add_photo', compact('product'));
    }

    // Lưu ảnh vào bảng photos
    public function storePhoto(Request $request, $productId)
    {

        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = public_path('products');


            if (!file_exists($imagePath)) {
                mkdir($imagePath, 0777, true);
            }

            $image->move($imagePath, $imageName);
            $photo = new Photo();
            $photo->photo_name = $imageName;
            $photo->product_id = $productId;
            $photo->save();

            return redirect()->route('products.index', $productId)->with('success', 'Image has been uploaded!');
        } else {
            return redirect()->back()->with('error', 'Error occured when uploading image');
        }
    }

    public function listPhotos()
    {
        $photos = Photo::with('product:id,title,image')->orderBy('product_id')->paginate(10);
        return view('Admin/products/list_photos', compact('photos'));
    }

    public function searchPhotos(Request $request)
    {
        $keyword = $request->input('keyword');

        $photos = Photo::with('product:id,title')
            ->whereHas('product', function ($query) use ($keyword) {
                $query->where('title', 'like', "%{$keyword}%");
            })
            ->orderBy('product_id')
            ->paginate(10);


        return view('Admin/products/list_photos', compact('photos'));
    }

    public function deletePhoto($photo_id)
    {
        try {
            $photo = Photo::find($photo_id);
            $image_path = public_path('products/' . $photo->photo_name);

            // Check if the image file exists before attempting to delete it
            if (file_exists($image_path)) {
                unlink($image_path); // Delete the photo file from the folder
            }

            // Delete the photo from the database
            $photo->delete();
            return redirect()->back()->with("success", "Image has been deleted");
        } catch (Exception $ex) {
            return redirect()->back()->with("error", "Cannot delete image");
        }
    }
}
