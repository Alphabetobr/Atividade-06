<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FilmesController;

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
Route::get('/home',[UserController::class,'auth'])->name('painel.auth');
Route::get('/painel',[UserController::class, 'teste'])->name('painel.page');
Route::prefix('registro')->group(function() {
    Route::get('/', [UserController::class, 'register'])->name('register.page');
    Route::post('/',[UserController::class, 'cadastrar'])->name('cadastro.page');
});

Route::prefix('filmes')->group(function() {
    Route::get('/', [FilmesController::class, 'Lista'])->name('lista.page');

});
Route::resource('/lista', FilmesController::class);

Route::resources([
    'Filmes' => FilmesController::class,
    'posts' => FilmesController::class,
]);

Route::get('/test',[FilmesController::class,'test'])->name('test.page');
