<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Bird\BirdsController;
use App\Http\Controllers\Category\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name("welcome");


Route::get('dashboard', [DashboardController::class, "show"])
->name('dashboard')
->middleware("auth");

Route::get('birds', [BirdsController::class, "show"])
->name('list-birds')
->middleware("auth");

Route::get('create-bird', [BirdsController::class, "create"])
->name("create-bird")
->middleware("auth");

Route::get('update-bird/{id}', [BirdsController::class, "update"])
->name("update-bird")
->middleware("auth");


Route::get('categories', [CategoryController::class, "show"])
->name('list-categories')
->middleware("auth");

Route::get('create-category', [CategoryController::class, "create"])
->name("create-category")
->middleware("auth");

Route::get('update-category/{id}', [CategoryController::class, "update"])
->name("update-category")
->middleware("auth");


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
