@extends('layouts.main')
@section('title' , 'DANZIN EVENTS')
@section('content')

<div id="search-container" class="col-md-12">
    <h1>Busque um evento</h1>
    <form action="/" method="GET">
        <input type="text" id="search" class="form-control" placeholder="Procurar..." name="search" value="{{ $search }}">
    </form>
</div>
<div id="events-container" class="col-md-12">
   @if ($search)
         <h2>Buscando por {{$search}}</h2>
         @else
         <h2>Proximos Eventos</h2>
   @endif
    <p class="subtitle">
     <strong>
        Veja os eventos do proximos dias :
    </strong>
</p>
    <div id="cards-container" class="row">
       {{--  $events como $event --}}
        @foreach ( $events as $event ){{-- Essa variavel $events vem la do controller EventController que faz conexao com banco de dados por isso estou usando o title em baixo --}}
         <div class="card col-md-3">
            <img src="/img/events/{{$event->image}}" alt="{{$event->title}}">
            <div class="card-body">
                <div class="card-date">{{date('d/m/Y', strtotime($event->date))}}</div> {{-- desse jeito a data vai sem horas --}}
                <h5 class="card-title">{{$event->title}}</h5>
                <p class="card-participantes"> PARTICIPANTES</p>
                <a href="/events/{{$event->id}}" class="btn btn-primary">Saber mais</a>
            </div>
         </div>
        @endforeach
        @if(count($events) == 0 && $search)
            <p>Não foi possível encontrar nenhum evento com: {{ $search }}! <a href="/">Ver todos</a></p>
        @elseif(count($events) == 0)
            <p>Não há eventos disponíveis.</p>
        @endif
    </div>
</div>


@endsection
