<?php

namespace App\Http\Controllers\Category;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exceptions\CategoryNotFoundException;

class CategoryController extends Controller
{


    /**
     * Show the list ctegories view.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        return view('category.list-categories');
    }
    
    /**
     * Show the create form view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('category.create-category');
    }


    /**
     * Show the update form view.
     *
     * @return \Illuminate\View\View
     */
    public function update($id)
    {
        $category = Categories::find($id);
        if(!$category){
            abort(400, "Category not found");
        }
        return view('category.update-category', [
            "category"=>$category
        ]);
    }

}
