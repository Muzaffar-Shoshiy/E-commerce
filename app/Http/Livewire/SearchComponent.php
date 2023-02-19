<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class SearchComponent extends Component
{
    public $query;
    public function mount()
    {
        $this->fill(request()->only('query'));
    }
    public function render()
    {
        $categories = Category::all();
        return view('livewire.search-component', compact('categories'));
    }
}
