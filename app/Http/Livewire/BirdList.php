<?php

namespace App\Http\Livewire;


use App\Models\Bird;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use App\Exceptions\DeleteElementFailException;
use App\Services\Birds\BirdService;

class BirdList extends Component
{

    use WithPagination;

    public string $search = "";

    public string $orderField = "id";
    public string $orderDirection = "ASC";

    public array $selection = [];
    public bool $allSelect = false;

    public int $nbLines = 15;

    public int $editId = 0;


    protected $queryString = [
        "page"=>["except"=>1, "as"=>"p"],
        "search"=>["except"=>"", "as"=>"s"],
        "orderDirection"=>["except"=>"ASC", "as"=>"d"],
        "orderField"=>["except"=>"id", "as"=>"f"],
        "nbLines"=>["except"=>15, "as"=>"r"],
    ];





    public function paginationView()
    {
        return 'pagination.custom-pagination';
    }

    


    public function updatedPage()
    {
        $this->selection = [];
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function updatingNbLines(){
        $this->resetPage();
    }







    public function setOrderField(string $field_name){
        if($this->orderField === $field_name){
            $this->orderDirection = $this->orderDirection=="ASC" ? "DESC" : "ASC";
        }
        else{
            $this->orderField = $field_name;
            $this->orderDirection = "ASC";
        }
        $this->selection = [];
    }


    

    public function deleteSelection(array $ids, BirdService $birdService){

        try {
            $birdService->deleteBirds($ids);
        } catch (DeleteElementFailException $e) {
            session()->flash("error", $e->getMessage());
            return false;
        }
        
        $this->selection = [];
        session()->flash("success", "Birds deleted !");

        
    }


    public function closeFlashMessage(){
        session()->forget("success");
        session()->forget("error");
    }

    



    public function render(BirdService $birdService, Request $request)
    {

        $birds = 
        Bird::where("french_name", "LIKE", "%{$this->search}%")
        ->orWhere("latin_name", "LIKE", "%{$this->search}%")
        ->orWhere("description", "LIKE", "%{$this->search}%")
        ->orderBy($this->orderField, $this->orderDirection)
        ->paginate($this->nbLines);
        
        
        $this->allSelect = count(array_diff($birds->pluck("id")->all(), $this->selection))==0 && count($this->selection)>0;

        return view('livewire.bird-list', [
            "birds"=>$birds
        ]);
    }
}
