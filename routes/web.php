<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [UserController::class,  'list']);
Route::get('/create', [UserController::class,  'create']);
Route::post('/store', [UserController::class,  'store']);
Route::get('/edit/{id}', [UserController::class,  'edit']);
Route::get('/update/{id}', [UserController::class,  'update']);
Route::get('/delete/{id}', [UserController::class,  'delete']);