<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoryComponent extends Component
{
    public function render()
    {
        $categories = Category::with('childs')->where('parent_id', 0)->get();
        return view('livewire.category-component', compact('categories'));
    }
}
