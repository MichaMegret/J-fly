<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categories;
use App\Models\BirdCategory;
use Livewire\WithFileUploads;

class UpdateBird extends Component
{

    use WithFileUploads;

    public $bird;

    public $frenchName;
    public $latinName;
    public $description;
    public $birdImage;
    public string $birdImageName = "";
    public $categories = [];

    public function mount(){
        $this->frenchName = $this->bird->french_name;
        $this->latinName = $this->bird->latin_name;
        $this->description = $this->bird->description;
        $this->categories = $this->bird->categories->pluck("id")->toArray();
    }

    public function updatedbirdImage(){

        if($this->validate([
            'birdImage' => 'nullable|mimes:jpeg,jpg,bmp,png,webp|max:3072',
        ])){
            $this->birdImageName = $this->birdImage->getClientOriginalName();
        }

    }


    public function messages()
    {
        return [
            'birdImage.max' => 'File size must not exceed 3Mo',
        ];
    }


    /**
    * Update bird
    */
    public function update(){

        $this->validate([
            'frenchName' => 'required|max:255',
            'latinName' => 'required|max:255',
            'description' => 'required|max:1500',
            'birdImage' => 'nullable|mimes:jpeg,jpg,bmp,png,webp|max:3072',
        ]);

        $this->bird->french_name = $this->frenchName;
        $this->bird->latin_name = $this->latinName;
        $this->bird->description = $this->description;
        $this->bird->image = $this->birdImage ? $this->birdImage->store('bird-images', 'public') : $this->bird->image;

        $this->bird->save();

        foreach($this->bird->categories as $category){
            $birdCategory = BirdCategory::where("bird_id","=",$this->bird->id)
            ->where("category_id","=",$category->id);
            $birdCategory->delete();
        }

        if($this->categories){
            foreach($this->categories as $category){
                BirdCategory::create([
                    "bird_id"=>$this->bird->id,
                    "category_id"=>$category
                ]);
            }
        }

        return redirect()->to("update-bird/{$this->bird->id}")->with("success", "Bird updated !");

    }

    public function render()
    {
        $birdCategories = Categories::all();
        return view('livewire.update-bird',[
           "birdCategories"=>$birdCategories 
        ]);
    }
}
