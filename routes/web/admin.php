<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/',[\App\Http\Controllers\admin\AdminController::class , 'index'])->name('dashboard');

Route::resource('users', \App\Http\Controllers\admin\UserController::class);

Route::resource('citys', \App\Http\Controllers\admin\CitysController::class);

Route::resource('locations', \App\Http\Controllers\admin\LocationController::class);

Route::resource('properties', \App\Http\Controllers\admin\PropertyController::class);

Route::resource('categories', \App\Http\Controllers\admin\CategoryController::class);

Route::resource('claims', \App\Http\Controllers\admin\ClaimController::class)->except('create' , 'show' , 'store');

Route::resource('location.gallery', \App\Http\Controllers\admin\LocationGalleryController::class);


Route::resource('comments', \App\Http\Controllers\admin\CommentController::class);













Route::post('ckeditor/upload', [\App\Http\Controllers\admin\AdminController::class , 'upload'])->name('ckeditor.upload');
