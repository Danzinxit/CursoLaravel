{{-- Copiar codigo do create nao e a melhor partica mais isso e para iniciantes --}}

@extends('layouts.main')
@section('title' , 'Editando :' . $event->title )
@section('content')


<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>'Editando : {{$event->title}}</h1>
    <form action="/event/update/{{$event->id}}" method="POST" enctype="multipart/form-data"> {{-- VEM DA ROTA NO WEB.PHP --}}  {{-- esse multipart/form-data serve para enviar arquivos por um formulario html --}}
        @csrf {{-- no laravel so com esse @ para conseguir levar dados do formulario para o banco --}}
        @method('PUT')
         <div class="form-group">
            <label for="image">Imagem do Evento:</label>
            <input type="file" id="image" name="image" class="from-control-file"> {{-- isso e para pegar alguma imagem do computador  --}}
            <img src="/img/events/{{$event->image}}" alt="{{$event->title}}" class="img-preview">
             </div>
        <div class="form-group">
            <label for="title">Evento:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Nome do Evento" value="{{$event->title}}">
             </div>
             <div class="form-group">
            <label for="date">Data do evento</label>
            <input type="date" class="form-control" id="date" name="date" value="{{ $event->date->format('Y-m-d') }}">{{-- adicionando valores de city e data antes de editar o que vem original --}}
             </div>
  <div class="form-group">
              <label for="title">Cidade:</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Local do Evento" value="{{$event->city}}"> {{-- adicionando valores de city e data antes de editar o que vem original --}}
             </div>
  <div class="form-group">
              <label for="title">O evento e privado?</label>
            <select name="private" id="private" class="form-control">
                <option value="0">Não</option>
                <option value="1" {{$event->private ==1 ? "selected = 'selected' " : ""}}>Sim</option> {{-- if ternario para ver se e privado ou nao --}}
            </select>
             </div>
  <div class="form-group">
              <label for="title">Descrição:</label>
                <textarea name="description" id="description" class="form-control" placeholder="O que vai acontecer no evento?">{{$event->description}}</textarea>
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
        <input type="submit" class="btn btn-primary" value="Editar Evento">
    </form>
</div>



@endsection
