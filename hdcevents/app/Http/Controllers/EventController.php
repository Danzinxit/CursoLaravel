<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(){
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
    'trabalho'=>$trabalho    //puxa da api e da view welcome.blade.php
    ]);
    }

    //action create
    public function create(){
        return view('events.create'); //separar views
        //separar em controllers das views em pastas
    }
    

}
