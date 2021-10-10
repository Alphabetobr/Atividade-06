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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',[UserController::class,'login'])->name('login.page');
Route::get('/painel',[UserController::class,'auth'])->name('painel.auth');

Route::prefix('registro')->group(function() {
    Route::get('/', [UserController::class, 'register'])->name('register.page');
    Route::post('/',[UserController::class, 'cadastrar'])->name('cadastro.page');
});