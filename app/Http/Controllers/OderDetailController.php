<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OderDetailController extends Controller   {


    public function index()
    {
        $orders = Order::where('status', 1)->get();
        $totalOrders = Order::where('status', 1)->count();
        return view('Admin.checked_order.index', [
            'orders' => $orders,
            'totalOrders' => $totalOrders,
        ]);
    }

    // order detail
    public function showOrderDetails($id)
{
    $order = Order::with(['details.product'])->findOrFail($id); 

    return view('Admin.dashboard.orderdetail', compact('order'));
}

public function confirm($order_id)
{
    $order = Order::find($order_id);
    if ($order && !$order->status) {
        DB::transaction(function () use ($order) {
            foreach ($order->details as $detail) {
                $product = Products::find($detail->product_id); 
                if ($product->quantity >= $detail->quantity) {
                    $product->quantity -= $detail->quantity;
                    $product->save(); 
                } else {
                    throw new \Exception('Insufficient inventory for the product: ' . $product->title);
                }
            }
            $order->status = 1;
            $order->checked_by = Auth::user()->name;    
            $order->save();
        });
        return redirect()->back()->with('success', 'Order has been confirmed and inventory updated successfully!');
    }
    return redirect()->back()->with('error', 'Order not found or order has been confirmed.');
}


    
}