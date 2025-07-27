@extends('layouts.main')
@section('title' , 'DANZIN EVENTS')
@section('content')

<div id="search-container" class="col-md-12">
    <h1>Busque um evento</h1>
    <form action="">
        <input type="text" id="search" class="form-control" placeholder="Procurar...">
        <ion-icon name="search-outline"></ion-icon>
    </form>
</div>
<div id="events-container" class="col-md-12">
    <h2>Proximos Eventos</h2>
    <p class="subtitle">
     <strong>
        Veja os eventos do proximos dias :
    </strong>
</p>
    <div id="cards-container" class="row">
        @foreach ( $events as $event ){{-- Essa variavel $events vem la do controller EventController que faz conexao com banco de dados por isso estou usando o title em baixo --}}
         <div class="card col-md-3">
            <img src="/img/palestra.jpg" alt="{{$event->title}}">
            <div class="card-body">
                <div class="card-date">10/09/2020</div>
                <h5 class="card-title">{{$event->title}}</h5>
                <p class="card-participantes"> 222PARTICIPANTES</p>
                <a href="#" class="btn btn-primary">Saber mais</a>
            </div>
         </div>
        @endforeach
    </div>
</div>


@endsection
