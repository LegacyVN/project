<?php


namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
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
            'discount_price' => 'nullable|numeric',
            'status' => 'required|boolean',
        ]);

    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        } else {
            return redirect()->back()->with('error', 'Không thể tải lên hình ảnh.');
        }


        $productData = $request->only(['title', 'description', 'price', 'category_id', 'quantity', 'discount_price', 'status']);
        $productData['image'] = $imagePath;

        $product = Products::create($productData);

        if ($product) {
            return redirect()->route('products.index')->with('success', 'Sản phẩm đã được thêm thành công!');
        } else {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi thêm sản phẩm.');
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

   
        return redirect()->route('products.index')->with('msg', 'Cập nhật sản phẩm thành công!');
    }

    public function delete($id)
    {
 
        $product = Products::findOrFail($id);

        $product->delete();

        return redirect()->route('products.index')->with('msg', 'Xóa sản phẩm thành công!');
    }
}
