<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoriessTable extends Component
{
    public $search="";
    public $page=5;
    public function render()
    {
        $categories = Category::query()
            ->where('name', 'like', '%' . $this->search . '%')
            ->paginate($this->page);
        return view('livewire.categoriess-table',compact('categories'));
    }
}
