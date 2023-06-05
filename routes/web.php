<?php

use App\Http\Controllers\UserController;
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


Route::get('/', [UserController::class, 'index'])->name('home');
Route::get('/create', [UserController::class, 'create'])->name('create');
Route::post('user/create', [UserController::class, 'store'])->name('store');
Route::get('user/delete/{ID}', [UserController::class, 'delete'])->name('delete');