<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController; // import for using Home Controller to manage all Home related functions

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

// Routes for Home-related pages. Controlled by the homecontroller class

Route::get('/', [HomeController::class, 'index'] )->name('home.index');
Route::get('/about', [HomeController::class, 'about'] )->name('home.about');      // Name method adds names to each of these routes, the naming convention here is the name of the controller
Route::get('/contact', [HomeController::class, 'contact'] )->name('home.contact');      // followed by a . then the name of the name of the action on that controller. they must have unique names


// To make route parameters optional, follow them up with a ?, as seen below
// If you do this, you need to assign default values for the params, here category and items' default params are null
Route::get('/store/{category?}/{item?}', function ($category = null, $item = null) { // route params and function params map to each other using same name
    
    // $category = request('category'); // since the params are in the function, we don't need the request function

    // check for category
    if (isset($category)){

        // check for item
        if(isset($item)){
            return "you are viewing the store for {$category} for {$item}";
        }

        return "You are viewing the store for " . strip_tags($category); // strip tags sanitizes the input, prevents malicious code injections
    }

    // if neither are set, show everything
    return "You are viewing the store for all instruments"; 
});