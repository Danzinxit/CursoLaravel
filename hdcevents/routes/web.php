<?php

use Illuminate\Support\Facades\Route;

//O / aqui e o nome que vai querer ser chamada por exemplo no link
Route::get('/', function () {//PONTO INICIAL
    $array = [1,2,3,4,5];
    $array2 = ["MG","SP", "RJ", "ES"];//foreach
    $vetor = ["MG" => "Minas Gerais" ,"SP" => "Sao paulo", "RJ" => "Rio de Janeiro", "ES" => "Espirito Santo"];//foreach 2
    $idade = 18;
    $nome = "Daniel";
    $trabalho = 'DEV FULL STACK';
    return view('welcome',
    [
    'array'=>$array,
    'array2'=>$array2,
    'vetor'=>$vetor,
    'nome'=> $nome,
    'idade'=>$idade,
    'trabalho'=>$trabalho
]);// vai acessar no blade direto da chave que esta entre sttring tipo :  'nome'
});
//get e receber dados
Route::get('/contact', function () {
    return view('contact'); //o primeiro nome e sempre o primerio nome do arquivo que criei na view
});
Route::get('/produtos', function () {
    return view('products'); //o primeiro nome e sempre o primerio nome do arquivo que criei na view
});

