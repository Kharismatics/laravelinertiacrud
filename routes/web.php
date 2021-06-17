<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;
use App\Http\Controllers\FileStorageController;
use App\Http\Controllers\SubDetailController;
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
    return Inertia\Inertia::render('Home');
});
Route::resource('card', CardController::class);
// Route::resource('file', FileStorageController::class);
Route::resource('card.file', FileStorageController::class);
Route::resource('card.detail', SubDetailController::class, [
    'parameters' => ['file' => 'file:id','card' => 'card:id'],
]);