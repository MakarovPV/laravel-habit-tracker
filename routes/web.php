<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\HabitsController::class, 'index']);
Route::get('/previous', [App\Http\Controllers\HabitsController::class, 'previous']);
Route::get('/next', [App\Http\Controllers\HabitsController::class, 'next']);
Route::get('/return', [App\Http\Controllers\HabitsController::class, 'returnToMainPage']);
Route::post('/insert', [App\Http\Controllers\HabitsController::class, 'store']);
Route::delete('/destroy/{id}', [App\Http\Controllers\HabitsController::class, 'destroy']);

Route::post('/update/{id}', [App\Http\Controllers\DaysOfHabitsController::class, 'update']);

Auth::routes();

