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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/profile' , [\App\Http\Controllers\ProfileController::class,'profile'])->name('profile.index');
Route::put('/profile/user/{user}/update' , [\App\Http\Controllers\ProfileController::class , 'updateProfile'])->name('update.profile');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('main');


Route::get('/cities/', [\App\Http\Controllers\HomeController::class, 'cities'])->name('city.index');
Route::get('/city/{city:slug}', [\App\Http\Controllers\HomeController::class, 'city'])->name('city.single');

Route::get('/locations/', [\App\Http\Controllers\home\LocationController::class, 'index'])->name('location.index');
Route::get('/location/{location:slug}', [\App\Http\Controllers\home\LocationController::class, 'single'])->name('location.single');

Route::post('/location/claim', [\App\Http\Controllers\home\LocationController::class, 'claim'])->name('claim');

Route::post('/location/comment', [\App\Http\Controllers\home\LocationController::class, 'comment'])->name('comment.store');

Route::get('/category/', [\App\Http\Controllers\CategoryController::class, 'index'])->name('home.category.index');
Route::get('/category/{category:slug}', [\App\Http\Controllers\CategoryController::class, 'archive'])->name('home.category.archive');

Route::get('/location/search', [\App\Http\Controllers\home\LocationController::class, 'search'])->name('home.category.search');

//Auth::routes();
//
//Route::get('/main', [App\Http\Controllers\HomeController::class, 'index'])->name('main');
