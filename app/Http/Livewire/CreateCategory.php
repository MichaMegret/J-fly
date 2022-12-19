<?php

namespace App\Http\Livewire;

use App\Models\Categories;
use Livewire\Component;

class CreateCategory extends Component
{

    public $categoryName;
    public $color;
    public $activeColor = "";

    protected $listeners = [
        "defineColor"
    ];

    public function render()
    {
        return view('livewire.create-category');
    }

    public function defineColor($selectedColor){
        $this->color = $selectedColor;
        $this->activeColor = $selectedColor;
    }

    /**
    * Register a new category
    */
    public function create(){

        $this->validate([
            'categoryName' => 'required|max:255',
            'color' => 'required|max:255',
        ]);

        Categories::create([
            "name" => $this->categoryName,
            "color" => $this->color,
        ]);

        // session()->flash("success", "Birds created !");
        return redirect()->route("list-categories")->with("success", "Category created !");

    }
}
