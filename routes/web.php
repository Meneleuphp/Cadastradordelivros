<?php

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


use App\http\controllers\EventController;

/* Rotas padrões do laravel, index, create, show */

Route::get('/', [EventController::class, 'index']); /* Mostra todos os registros */
/* Create cria registros do banco de dados */
Route::get('/events/create',[EventController::class,'create'])->middleware('auth'); /* middleware só acessa autenticado*/
Route::get('/events/{id}',[EventController::class,'show']); /* show mostra dados específicos do banco de dados */
Route::post('/events',[EventController::class, 'store']); /* Envia os dados do banco de dados*/
Route::delete('/events/{id}', [EventController::class, 'destroy'])->middleware('auth');;/* Rota dele em events ID, deletar evento */
Route::get('events/edit/{id}', [EventController::class, 'edit'])->middleware('auth'); /* Edita os dados e insere novas informações */
Route::put('events/update/{id}', [EventController::class, 'update'])->middleware('auth');


Route::get('/contact', function(){

    return view('contact');

});

Route::get('/dashboard', [EventController::class, 'dashboard'])->middleware('auth');



