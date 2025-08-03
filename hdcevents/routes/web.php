<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController; //conectar ao EventController
//REGRAS :
/* 1. GET
O que faz: Solicita dados do servidor.
Características:
Usado para consultar ou ler dados.

2. POST
O que faz: Envia dados para o servidor.
Características:
Usado para criar recursos.

3. PUT
O que faz: Atualiza um recurso inteiro no servidor.
Características:
Substitui todos os dados do recurso.
Também envia dados no corpo da requisição.


Diferença principal entre POST e PUT
POST: cria um novo recurso (não importa se existe outro igual).

PUT: atualiza um recurso existente (e se não existir, pode criar dependendo da API). */


//O / aqui e o nome que vai querer ser chamada por exemplo no link
Route::get('/', [EventController::class, 'index' /* Nome da class que e EventController e index que e o metodo */]); //Conectar ao
//get e receber dados
Route::get('/events/create', [EventController::class, 'create' /* esse entre aspas e o nome do metodo */ ] )->middleware('auth'); //middleware('auth') e para proteger a rota, ou seja, so pode acessar se estiver logado

Route::get('events/{id}', [EventController::class, 'show']); //o show e para mostrar um registro especifico do banco

//ROTA DE POST PARA ENVIAR DADOS DO FORMULARIO
//E so /events poque ele vai enviar dados e nao trazer dados
Route::post('/events' , [EventController::class, 'store']);
Route::delete('/events/{id}', [EventController::class, 'destroy'])->middleware('auth'); //rota de deletar
Route::get('/events/edit/{id}', [EventController::class, 'edit'])->middleware('auth');
Route::put('/event/update/{id}' , [EventController::class, 'update'])->middleware('auth'); //rota put e de atualiza



Route::get('/dashboard', [EventController::class, 'dashboard'])->middleware('auth');

Route::get('/contact', function () {
    return view('contact'); //o primeiro nome e sempre o primerio nome do arquivo que criei na view
});

Route::post('/events/join/{id}', [EventController::class, 'joinEvent'])->middleware('auth');    //id do proprio evento /EventController e a action
Route::delete('/events/leave/{id}', [EventController::class, 'leaveEvent'])->middleware('auth');    //id do proprio evento /EventController e a action






















/* Route::get('/produtos', function () {
    $busca = request('search');
    return view('products', ['busca' => $busca]); //o primeiro nome e sempre o primerio nome do arquivo que criei na view
});
Route::get('/produto/{id?}',function($id = null){ //passa passoa a passo os id
//tem que passar um parametro se nao tiver o ? se nao a apagina da erro
    return view('product', ['id' => $id]);
}); */

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
});
