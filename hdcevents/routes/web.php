<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController; //conectar ao EventController

//O / aqui e o nome que vai querer ser chamada por exemplo no link
Route::get('/', [EventController::class, 'index'] ); //Conectar ao
//get e receber dados
Route::get('/events/create', [EventController::class, 'create' /* esse entre aspas e o nome do metodo */ ] );

Route::get('/contact', function () {
    return view('contact'); //o primeiro nome e sempre o primerio nome do arquivo que criei na view
});
Route::get('/produtos', function () {
    $busca = request('search');
    return view('products', ['busca' => $busca]); //o primeiro nome e sempre o primerio nome do arquivo que criei na view
});
Route::get('/produto/{id?}',function($id = null){ //passa passoa a passo os id
//tem que passar um parametro se nao tiver o ? se nao a apagina da erro
    return view('product', ['id' => $id]);
});
