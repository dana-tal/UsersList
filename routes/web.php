<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ListController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('login',[UserController::class,'create'])->name('login');
Route::post('login',[UserController::class,'store']);
Route::post('logout',[UserController::class,'destroy'])->middleware('auth');


Route::get('register',[UserController::class,'display_registration_form']);
Route::post('register',[UserController::class,'store_registration_info']);

Route::get('/users',[ListController::class,'index'])->middleware('auth');
Route::get('/', function () {
    return Inertia::render('Home');
});

Route::post('/users/delete',[ListController::class,'remove_users']);


Route::get('/home', function () {
    return Inertia::render('Home');
});


