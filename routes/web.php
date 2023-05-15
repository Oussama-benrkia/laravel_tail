<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;
use Illuminate\Http\Response;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware("auth")->group(function(){
    Route::put('/listing/{listing}',[ListingController::class,"update"]);
    Route::delete('/listing/{listing}',[ListingController::class,"destroy"]);
    Route::post('/listing',[ListingController::class,"store"]);
    Route::get('/listing/create',[ListingController::class,"create"]);
    Route::get('/listing/{listing}/edit',[ListingController::class,"edit"]);
    Route::post("/logout",[UserController::class,"logout"]);
    Route::get("/listing/manager",[ListingController::class,"manager"]);

});
Route::middleware("guest")->group(function(){
    Route::get("/Register",[UserController::class,"create"]);
    Route::get("/login",[UserController::class,"show"])->name("login");
    Route::post("/users",[UserController::class,"store"]);
    Route::post("/users/login",[UserController::class,"login"]);

});
Route::get('/',[ListingController::class,"index"]);
Route::get('/listing/{listing}',[ListingController::class,"show"])->where("listing","\d+");


Route::fallback(function(Response $response){
    return view('error');
});

///users/login


