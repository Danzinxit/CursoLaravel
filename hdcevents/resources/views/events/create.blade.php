@extends('layouts.main')
@section('title' , 'Criar Evento')
@section('content')


<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Crie o seu evento</h1>
    <form action="/events" method="POST"> {{-- VEM DA ROTA NO WEB.PHP --}}
        @csrf {{-- no laravel so com esse @ para conseguir levar dados do formulario para o banco --}}
        <div class="form-group">

            <label for="title">Evento:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Nome do Evento">

              <label for="title">Cidade:</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Local do Evento">

              <label for="title">O evento e privado?</label>
            <select name="private" id="private" class="form-control">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>

              <label for="title">Descrição:</label>
                <textarea name="description" id="description" class="form-control" placeholder="O que vai acontecer no evento?"></textarea>
        </div>
        <input type="submit" class="btn btn-primary" value="Criar Evento">
    </form>
</div>



@endsection
