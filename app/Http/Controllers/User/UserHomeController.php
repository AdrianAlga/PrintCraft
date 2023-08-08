<?php

namespace App\Http\Controllers\User;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserHomeController extends Controller
{
    public function index()
    {
        return view('users.home', [
            "title" => "Home",
            "products" => Product::where('stock', '>', 0)->get(),
            "carts" => Cart::where("user_id", auth()->user()->id)->get(),
            "cart_count" => Cart::where("user_id", auth()->user()->id)->count(),
        ]);
    }

    public function detailProduct(Product $product)
    {
        return view('users.product-detail', [
            "title" => "Detail Product",
            "product" => $product,
            "carts" => Cart::where("user_id", auth()->user()->id)->get(),
            "cart_count" => Cart::where("user_id", auth()->user()->id)->count(),
        ]);
    }

    public function checkout()
    {
        return view('users.checkout', [
            "title" => "Cehckout",
            "carts" => Cart::where("user_id", auth()->user()->id)->get(),
        ]);
    }

    public function confirmPayment(Order $order)
    {
        return view('users.confirm-payment', [
            "title" => "Konfirmasi Pembayaran",
            "order" => $order,
        ]);
    }

    public function successPayment()
    {
        return view('users.success-payment', [
            "title" => "Success Payment",
        ]);
    }

    public function addCart(Request $request)
    {
        $validated = $request->validate([
            "product_id" => "required|exists:products,id",
            "amount" => "required|numeric|min:1",
        ]);
        $validated["user_id"] = Auth()->user()->id;
        Cart::create($validated);
        if ($request->checkout) {
            return redirect()->route('checkout')->with("success", "item berhasil ditambahkan ke keranjang");
        } else {
            return back()->with("success", "item berhasil ditambahkan ke keranjang");
        }
    }

    public function destroyCart(Cart $cart)
    {
        $cart->delete();
        return back()->with("success", "Item berhasil di hapus dari cart");
    }

    public function order(Request $request)
    {
        $validated = $request->validate([
            "products_id" => "required",
            "amounts" => "required",
            "name" => "required|string",
            "phone" => "required|numeric",
            "address" => "required|string",
            "payment" => "required|numeric|in:1,2,3,4",
            "total" => "required|numeric",
        ]);
        $validated["user_id"] = Auth()->user()->id;
        $carts = $request->carts;
        foreach ($carts as $cart) {
            Cart::where('id', $cart)->delete();
        }
        $validated['products_id'] = json_encode($validated["products_id"]);
        $validated['amounts'] = json_encode($validated["amounts"]);
        $order = Order::create($validated);
        
        return redirect()->route('payment', ['order' => $order->id])->with("success", "Checkout berhasil");
    }
}
