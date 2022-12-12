<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductFormRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function show($id) {
        $product = Product::findOrfail($id);
        
        return view('products.show', compact('product'));
    }

    public function create() {
        
        return view('products.create');
    }

    public function store(ProductFormRequest $request) {

        $request->validated();

        // dd("test");

        if($request->hasFile('foto')) {
            $image_path = 'storage/' . $request->file('foto')->store('images_product', 'public');
        }
        
        Product::create([
            'nama' => $request->input('nama'),
            'harga' => $request->input('harga'),
            'deskripsi' => $request->input('deskripsi'),
            'foto_name' => $request->file('foto')->getClientOriginalName(),
            'foto_url' => $image_path
        ]);

        return redirect()->back()->with('success', 'Product created successfully');
    }

    public function update(ProductFormRequest $request, $id) {

        $request->validated();

        $product = Product::findOrFail($id);
        
        if($request->hasFile('foto')) {
            $image_path = 'storage/' . $request->file('foto')->store('images_product', 'public');
        }

        $product->update([
            'nama' => $request->input('nama'),
            'harga' => $request->input('harga'),
            'deskripsi' => $request->input('deskripsi'),
            'foto_name' => $request->hasFile('foto') ? $request->file('foto')->getClientOriginalName() : $product->foto_name,
            'foto_url' => $request->hasFile('foto') ? $image_path : $product->foto_url
        ]);
        
        return redirect()->back()->with('success', 'Product updated successfully');
    }

    public function destroy($id) {

        $product = Product::findOrFail($id);
        $product->delete();
        
        file_exists(public_path($product->foto_url)) ? unlink(public_path($product->foto_url)) : false;

        return redirect()->back()->with('success', 'Product deleted successfully');
    }

}
