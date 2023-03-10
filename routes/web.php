<?php

use App\Http\Controllers\AdController;
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

Route::get('/', [AdController::class, 'showAll']);



Route::get('/new', function () {return view('new');});
Route::post('/new', [AdController::class, 'newAd']);

Route::get('/ad-validation/{token}', [AdController::class, 'validateAd']);

Route::get('/ad/{token}', [AdController::class, 'show']);

Route::get('/ad-delete/{token}', [AdController::class, 'delete']);
