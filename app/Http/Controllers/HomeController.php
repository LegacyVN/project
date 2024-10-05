<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Products;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('admin.dashboard.index');
    }


    public function home(){
    
        return view("home/index");
  
     }

    // public function home() {
    //     $product = Product::orderBy('id', 'desc')->take(12)->get();
    //     return view('home.index' , compact('product'));
    // }

    public function product_details($id) {
        $data = Products::find($id);
        
        $products = Products::where('category_id', $data->category_id)->take(4)->get();
        
        return view('home.product_details', compact('data'), compact('products'));
    }
}
