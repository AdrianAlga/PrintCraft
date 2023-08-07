<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;

class UserOrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', auth()->user()->id)->where('status', 'pending')->get();
        // foreach ($orders as $key => $order) {
        //     $order['products'] = [];
        //     foreach (json_decode($order->products_id) as $index => $productId) {
        //         $order['products'][$index] = Product::find($productId);
        //     }
        // }
        return view('users.order.index', [
            "title" => "Order",
            "orders" => $orders,
        ]);
    }

    public function pay_image(Request $request, Order $order) {
        $validated = $request->validate([
            "pay_image" => "required|image",
        ]);
        $validated["pay_image"] = $request->file('pay_image')->store('pay_image');
        $order->update($validated);
        return back()->with("success", "Bukti Pembayaran Berhasil diKirim, tunggu konfirmasi selanjutnya");
    }

    public function history()
    {
        $orders = Order::where('user_id', auth()->user()->id)->where('status', 'success')->get();

        return view('users.order.order-history', [
            "title" => "Order History",
            "orders" => $orders,
        ]);
    }
}
