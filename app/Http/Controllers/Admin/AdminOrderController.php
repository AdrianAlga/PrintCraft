<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class AdminOrderController extends Controller
{
    public function index() {
        return view('admin.order.index', [
            "title" => "Pesanan",
            "orders" => Order::all(),
        ]);
    }

    public function show(Order $order) {
        $products = [];
        $order->products_id = json_decode($order->products_id);
        $order->amounts = json_decode($order->amounts);

        foreach ($order->products_id as $index => $productId) {
            $products[$index] = Product::find($productId);
            $products[$index]["amount"] = $order->amounts[$index];
        }
        // dd($products);

        return view('admin.order.show', [
            "title" => "Detail Pesanan",
            "order" => $order,
            "products" => $products,
        ]);
    }

    public function destroy(Order $order) {
        if ($order->pay_image) {
            Storage::delete($order->pay_image);
        }
        $order->delete();
        return redirect()->route("admin.order.index")->with('success', "Order Berhasil dihapus");
    }

    public function updateStatus(Request $request, Order $order) {
        $validated = $request->validate([
            "status" => "required|in:success,failed",
        ]);
        $order->update($validated);
        return back();
    }
}
