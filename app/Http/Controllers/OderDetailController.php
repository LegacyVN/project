<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Products;
use Illuminate\Support\Facades\DB;

class OderDetailController extends Controller   {
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
                    throw new \Exception('Kho hàng không đủ cho sản phẩm: ' . $product->title);
                }
            }
            $order->status = 1;
            $order->save();
        });
        return redirect()->back()->with('success', 'Đơn hàng đã được xác nhận và cập nhật kho hàng thành công!');
    }
    return redirect()->back()->with('error', 'Không tìm thấy đơn hàng hoặc đơn hàng đã được xác nhận.');
}


    
}