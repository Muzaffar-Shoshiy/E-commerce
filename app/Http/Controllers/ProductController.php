<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return view('backend.products', compact('products'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('backend.product_create', compact('categories'));
    }

    public function store(Request $request)
    {
        $path = $request->file('image')->store('image', 'public');
        Product::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'qty' => $request->qty,
            'price' => $request->price,
            'image' => $path,
        ]);
        session()->flash('success', 'Product has been created successfully!');
        return redirect()->route('products.create');
    }
    public function show($id)
    {
        //
    }

    public function edit(Product $product)
    {
        return view('backend.product_edit', compact('product'));
    }
    public function update(Request $request, Product $product)
    {
        if($request->hasFile('image')){
            if($product->image !== null){
                unlink('storage/'.$product->image);
            }
            $path = $request->file('image')->store('image', 'public');
            $product->update([
                'name' => $request->name,
                'slug' => $request->slug,
                'price' => $request->price,
                'qty' => $request->qty,
                'image' => $path
            ]);
            session()->flash('success', 'Product has been updated successfully!');
            return redirect()->route('products.index');
        }else{
            $product->update([
                'name' => $request->name,
                'slug' => $request->slug,
                'price' => $request->price,
                'qty' => $request->qty,
            ]);
            session()->flash('success', 'Product has been updated successfully!');
            return redirect()->route('products.index');
        }
    }
    public function destroy(Product $product)
    {
        $product->delete();
        session()->flash('success', 'Product has been deleted successfully!');
        return redirect()->back();
    }
}
