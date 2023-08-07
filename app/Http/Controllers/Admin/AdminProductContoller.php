<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdminProductContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product.index', [
            "title" => "Produk",
            "products" => Product::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create', [
            "title" => "Tambah Produk",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "required|string",
            "price" => "required",
            "stock" => "required|numeric",
            "product_category" => "required|in:catering,frozen",
            "food_category" => "required|in:ayam,sapi,risol,sosis",
            "image" => "required|image",
            "description" => "required|string",
        ]);
        $validated["image"] = $request->file('image')->store('product');
        Product::create($validated);
        return redirect()->route("admin.product.index")->with('success', "Produk Berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.product.show', [
            "title" => "Detail Produk",
            "product" => $product,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.product.edit', [
            "title" => "Edit Produk",
            "product" => $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            "name" => "required|string",
            "price" => "required",
            "stock" => "required|numeric",
            "product_category" => "required|in:catering,frozen",
            "food_category" => "required|in:ayam,sapi,risol,sosis",
            "image" => "nullable|image",
            "description" => "required|string",
        ]);
        if ($request->file("image")) {
            Storage::delete($product->image);
            $validated["image"] = $request->file('image')->store('product');
        }
        $product->update($validated);
        return redirect()->route("admin.product.index")->with("success", "Perubahan berhasil di simpan");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Storage::delete($product->image);
        $product->delete();
        return redirect()->route("admin.product.index")->with("success", "Produk berhasil di hapus");
    }
}
