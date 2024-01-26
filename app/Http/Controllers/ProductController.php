<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        // get products
        $products = Product::latest()->paginate(5);

        return view('product.index', compact('products'));
    }

    // Post
    public function create()
    {
        return view('product.create');
    }

    // Store
    public function store(Request $request)
    {
        // Validate
        $this->validate($request, [
            'name'          => 'required|min:1',
            'total_unit'    => 'required|min:1',
            'price'         => 'required|min:1',
            'image'         => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // upload image
        $image = $request->file('image');
        $image->storeAs('public/product', $image->hashName());

        // create
        Product::create([
            'name'          => $request->name,
            'total_unit'    => $request->total_unit,
            'price'         => $request->price,
            'notes'         => $request->notes,
            'image'         => $image->hashName()
        ]);

        return redirect()->route('product.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    // Edit
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    // Update
    public function update(Request $request, Product $product)
    {
        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/product', $image->hashName());

            //delete old image
            Storage::delete('public/product/'. $product->image);

            //update post with new image
            $product->update([
                'name'          => $request->name,
                'total_unit'    => $request->total_unit,
                'price'         => $request->price,
                'notes'         => $request->notes,
                'image'         => $image->hashName()
            ]);
        } else {
            //update post without image
            $product->update([
                'name'          => $request->name,
                'total_unit'    => $request->total_unit,
                'price'         => $request->price,
                'notes'         => $request->notes,
            ]);
        }

        return redirect()->route('product.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(Product $product)
    {
        Storage::delete('public/product'. $product->image);
        $product->delete();
        return redirect()->route('product.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
