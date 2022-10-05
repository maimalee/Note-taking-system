<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
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
Route::get('/' , [MainController::class, 'index']);
Route::get('user' , [UserController::class, 'index'])->name('users.index');
Route::match(['get', 'post'] , 'users/add',[UserController::class, 'add'])->name('users.add');
Route::get('users/{id}', [UserController::class, 'view'])->name('users.view');
Route::match(['get', 'post'], 'users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::get('users/{id}/delete' , [UserController::class, 'delete'])->name('users.delete');

Route::match(['get', 'post'], 'login', [AuthController::class, 'login'])->name('user.login');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
