<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
        return view('backend.categories', compact('categories'));
    }

    public function create()
    {
        $categories = Category::where('parent_id', 0)->get();
        return view('backend.category_create', compact('categories'));
    }

    public function store(Request $request)
    {
        $path = $request->file('image')->store('image', 'public');
        Category::create([
            'name' => $request->name,
            'image' => $path,
            'slug' => Str::slug($request->name),
            'parent_id' => $request->parent_id
        ]);
        session()->flash('success', 'Category has been created successfully!');
        return redirect()->route('categories.index');
    }
    public function show($id)
    {
        //
    }


    public function edit(Category $category)
    {
        return view('backend.category_edit', compact('category'));
    }
    public function update(Request $request, Category $category)
    {
        if($request->hasFile('image')){
            if($category->image !== null){
                unlink('storage/'.$category->image);
            }
            $path = $request->file('image')->store('image', 'public');
            $category->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'image' => $path
            ]);
            session()->flash('success', 'Category has been updated successfully!');
            return redirect()->route('categories.index');
        }else{
            $category->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name)
            ]);
            session()->flash('success', 'Category has been updated successfully!');
            return redirect()->route('categories.index');
        }
    }

    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('success', 'Category has been deleted successfully!');
        return redirect()->back();
    }
}
