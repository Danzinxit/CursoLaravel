@extends('layouts.main')
@section('title' , 'Criar Evento')
@section('content')


<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Crie o seu evento</h1>
    <form action="/events" method="POST" enctype="multipart/form-data"> {{-- VEM DA ROTA NO WEB.PHP --}}  {{-- esse multipart/form-data serve para enviar arquivos por um formulario html --}}
        @csrf {{-- no laravel so com esse @ para conseguir levar dados do formulario para o banco --}}
         <div class="form-group">
            <label for="image">Imagem do Evento:</label>
            <input type="file" id="image" name="image" class="from-control-file"> {{-- isso e para pegar alguma imagem do computador  --}}
             </div>
        <div class="form-group">
            <label for="title">Evento:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Nome do Evento">
             </div>
  <div class="form-group">
              <label for="title">Cidade:</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Local do Evento">
             </div>
  <div class="form-group">
              <label for="title">O evento e privado?</label>
            <select name="private" id="private" class="form-control">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select>
             </div>
  <div class="form-group">
              <label for="title">Descrição:</label>
                <textarea name="description" id="description" class="form-control" placeholder="O que vai acontecer no evento?"></textarea>
                </div>
                <div class="form-group">
              <label for="title">Adicione itens de infraestrutura:</label>
              <div class="fornm-group">
                <input type="checkbox" name="items[]" value="Cadeiras"> Cadeiras{{-- quando for usar um array de items tem que colocar dois [] para identificar para ir um ou mais items --}}
              </div>
              <div class="fornm-group">
                <input type="checkbox" name="items[]" value="Palco"> Palco {{--quando for usar um array de items tem que colocar dois [] para identificar para ir um ou mais items --}}
              </div>
              <div class="fornm-group">
                <input type="checkbox" name="items[]" value="Cerveja Gratis"> Cerveja Gratis {{--quando for usar um array de items tem que colocar dois [] para identificar para ir um ou mais items --}}
              </div>
              <div class="fornm-group">
                <input type="checkbox" name="items[]" value="Open Food"> Open Food {{--quando for usar um array de items tem que colocar dois [] para identificar para ir um ou mais items --}}
              </div>
              <div class="fornm-group">
                <input type="checkbox" name="items[]" value="Brindes"> Brindes {{--quando for usar um array de items tem que colocar dois [] para identificar para ir um ou mais items --}}
              </div>
                </div>
        <input type="submit" class="btn btn-primary" value="Criar Evento">
    </form>
</div>



@endsection
