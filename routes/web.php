<?php

use App\Http\Controllers\UserController;
use App\Models\User;
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

Route::get('/profile', [UserController::class, 'profile']);
Route::get('/find/{id}', [UserController::class, 'find']);

Route::get('/cadastrar', [UserController::class, 'create']);
Route::post('/cadastrar', [UserController::class, 'store']);



