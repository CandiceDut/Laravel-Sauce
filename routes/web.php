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

//Chemin d'accès au controller sauce
use App\Http\Controllers\SauceController;
//Mise en place des routes du client
Route::get('sauces', [SauceController::class,'index'])->name('sauces.index');
Route::get('sauces/{sauceId}', [SauceController::class, 'show'])->name('sauces.show');
Route::get('sauces/{sauceId}/edit', [SauceController::class, 'edit'])->name('sauces.edit');
Route::put('sauces/{sauceId}/update', [SauceController::class, 'update'])->name('sauces.update');
Route::delete('sauces/{sauceId}', [SauceController::class, 'destroy'])->name('sauces.destroy');
Route::get('/create', [SauceController::class, 'create'])->name('sauces.create');
Route::post('/store', [SauceController::class, 'store'])->name('sauces.store');

Auth::routes();

//Mise en place de la route vers home après connexion
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\ImageController;
Route::get('/upload', [ImageController::class, 'showForm']);
Route::post('/upload', [ImageController::class, 'upload'])->middleware('upload.check')->name('image.upload');