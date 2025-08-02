<?php

namespace App\Models;
//O MODEL CONECTA O BANCO DE DADOS COM O CONTROLLER
use Illuminate\Database\Eloquent\Model;
//usa URM Eloqeunt
class Event extends Model
{
    protected $casts = //casts da model
    [
        'items' => 'array',
        'date' => 'date'
    ];

    //INFORMAR PARA A MODEL QUE TEMOS UM CAMPO DE DATA NOVO

    protected $dates = ['date'];

    protected $guarded = []; //esse campo com array vaizo e que tudo que for enviado pelo POST pode ser atualizado sem restrição (TEM QUE COLOCAR VAZIO PARA EDITAR)

    public function user(){
        return $this->belongsTo('App\Models\User'); //belongsTo significa pertence a alguem , que seria a um usuario

        /* Este é um método do Eloquent (o ORM do Laravel) que define um relacionamento. Ele está dizendo: "Este evento ($this) pertence a um User". */
    }
}
