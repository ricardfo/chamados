<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ChamadoController;
use App\Http\Controllers\UserController;

Route::get('/', [IndexController::class, 'index'])->name('home');

/* Senha única */
Route::get('login', [LoginController::class, 'redirectToProvider'])->name('login');
Route::get('callback', [LoginController::class,'handleProviderCallback']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

/**/
Route::resource('categorias', CategoriaController::class);
Route::resource('chamados', ChamadoController::class);
Route::resource('users', UserController::class);
Route::resource('comentarios/{chamado}/', ComentarioController::class);

Route::get('atender', [ChamadoController::class, 'atender']);
Route::get('triagem', [ChamadoController::class,'triagem']);
Route::get('todos', [ChamadoController::class,'todos']);
Route::get('buscaid', [ChamadoController::class,'buscaid']);
Route::get('chamados/{chamado}/devolver', [ChamadoController::class,'devolver']);

Route::get('triagem/{chamado}', [ChamadoController::class,'triagemForm']);
Route::post('triagem/{chamado}', [ChamadoController::class,'triagemStore']);
