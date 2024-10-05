<?php

namespace App\Livewire\Category;

use App\Models\Dashboard\Category;
use Livewire\Component;
use Livewire\WithPagination;

class ShowCategories extends Component
{
    use WithPagination;
    public function render()
    {
        return view('livewire.category.show-categories',[
            'categories'                =>Category::latest()->paginate(8),
        ]);
    }
}
