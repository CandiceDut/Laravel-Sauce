<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Chemin d'accès au controller client version API
use App\Http\Controllers\SauceApiController;
//Mise en place des routes
Route::get('/sauces',[SauceApiController::class,'index']);
Route::get('/sauces/{sauceId}',[SauceApiController::class,'show']);
Route::post('/sauces/store',[SauceApiController::class,'store']);
Route::put('/sauces/{sauceId}',[SauceApiController::class,'update']);
Route::delete('/sauces/{sauceId}',[SauceApiController::class,'destroy']);
