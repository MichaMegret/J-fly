<?php

namespace App\Services\Birds;

use Exception;
use App\Models\Bird;
use App\Exceptions\BirdNotFoundException;
use App\Exceptions\DeleteElementFailException;

class BirdService{


    public function getBird($id){
        $bird = Bird::find($id);
        if(!$bird){
            throw new BirdNotFoundException("Bird not found");
        }
        return $bird;
    }

    public function deleteBirds($ids){
        try {
            Bird::destroy($ids);
        } catch (Exception $e) {
            throw new DeleteElementFailException("Cannot delete seleted birds.");
        }
    }

}