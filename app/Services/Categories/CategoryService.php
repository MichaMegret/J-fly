<?php

namespace App\Services\Categories;

use Exception;
use App\Exceptions\CategoryNotFoundException;
use App\Exceptions\DeleteElementFailException;
use App\Models\BirdCategory;
use App\Models\Categories;

class CategoryService{


    public function getCategory($id){
        $category = BirdCategory::find($id);
        if(!$category){
            throw new CategoryNotFoundException("Category not found");
        }
        return $category;
    }

    public function deleteCategories($ids){
        try {
            Categories::destroy($ids);
        } catch (Exception $e) {
            throw new DeleteElementFailException("Cannot delete seleted categories.");
        }
    }

}