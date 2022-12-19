<?php

namespace App\Http\Controllers\Bird;

use App\Http\Controllers\Controller;
use App\Models\Bird;
use Illuminate\Http\Request;

class BirdsController extends Controller
{
    
    /**
     * Show the list birds view.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        return view('bird.list-birds');
    }


    /**
     * Show the create form view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('bird.create-bird');
    }


    /**
     * Show the update form view.
     *
     * @return \Illuminate\View\View
     */
    public function update($id)
    {
        $bird = Bird::find($id);
        if(!$bird){
            abort(400, "Bird not found");
        }
        return view('bird.update-bird', [
            "bird"=>$bird
        ]);
    }

}
