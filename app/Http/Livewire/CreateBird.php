<?php

namespace App\Http\Livewire;

use App\Models\Bird;
use App\Models\BirdCategory;
use App\Models\Categories;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateBird extends Component
{

    use WithFileUploads;

    public $frenchName;
    public $latinName;
    public $description;
    public $birdImage;
    public string $birdImageName = "";
    public $categories = [];


    public function render()
    {

        $birdCategories = Categories::all();

        return view('livewire.create-bird', [
            "birdCategories" => $birdCategories
        ]);
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
    * Register a new bird
    */
    public function create(){

        $this->validate([
            'frenchName' => 'required|max:255',
            'latinName' => 'required|max:255',
            'description' => 'required|max:1500',
            'birdImage' => 'nullable|mimes:jpeg,jpg,bmp,png,webp|max:3072',
        ]);

        $bird = Bird::create([
            "french_name" => $this->frenchName,
            "latin_name" => $this->latinName,
            "description" => $this->description,
            "image" => $this->birdImage ? $this->birdImage->store('bird-images', 'public') : null
        ]);

        if($this->categories){
            foreach($this->categories as $category){
                BirdCategory::create([
                    "bird_id"=>$bird->id,
                    "category_id"=>$category
                ]);
            }
        }

        return redirect()->route("list-birds")->with("success", "Bird created !");

    }
    

}
