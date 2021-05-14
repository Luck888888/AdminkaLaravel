<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix'=>'admin'], function(){
    Route::get('/',[MainController::class, 'index'])->name('admin.index');
    Route::resource('/products',ProductController::class);
});
