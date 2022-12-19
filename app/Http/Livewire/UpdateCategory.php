<?php

namespace App\Http\Livewire;

use App\Models\Categories;
use Livewire\Component;

class UpdateCategory extends Component
{

    public $category;
    public $categoryName;
    public $color;
    public $activeColor;

    protected $listeners = [
        "defineColor"
    ];

    public function mount(){
        $this->categoryName = $this->category->name;
        $this->color = $this->category->color;
        $this->activeColor = $this->category->color;
    }

    public function defineColor($selectedColor){
        $this->color = $selectedColor;
        $this->activeColor = $selectedColor;
    }

    /**
    * Update a category
    */
    public function update(){

        $this->validate([
            'categoryName' => 'required|max:255',
            'color' => 'required|max:255',
        ]);

        $this->category->name = $this->categoryName;
        $this->category->color = $this->color;

        $this->category->save();

        return redirect()->to("update-category/{$this->category->id}")->with("success", "Category updated !");

    }

    public function render()
    {

        return view('livewire.update-category');
    }
}
