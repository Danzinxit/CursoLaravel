@extends('layouts.main')
@section('title', 'DANZIN EVENTS')
@section('content')

{{-- SEÇÃO DE BUSCA (HERO) --}}
<div id="search-container" class="container-fluid py-5">
    <div class="container">
        <h1 class="display-4 fw-bold text-center mb-4">Busque um evento</h1>
        <form action="/" method="GET">
            <div class="input-group input-group-lg shadow-sm">
                <input type="text" id="search" class="form-control" placeholder="Procurar por nome, cidade ou data..." name="search" value="{{ $search }}">
                <button class="btn btn-primary" type="submit" id="button-addon2">
                    <ion-icon name="search-outline" class="h5 m-0"></ion-icon>
                    <span class="visually-hidden">Buscar</span>
                </button>
            </div>
        </form>
    </div>
</div>

{{-- CONTAINER PRINCIPAL DOS EVENTOS --}}
<div id="events-container" class="container my-5">
    <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-4">
        @if ($search)
            <h2 class="h3">Buscando por: <span class="text-primary">{{ $search }}</span></h2>
        @else
            <h2 class="h3">Próximos Eventos</h2>
        @endif
        <p class="text-muted mb-0">
            <strong>{{ count($events) }}</strong> {{ count($events) == 1 ? 'evento encontrado' : 'eventos encontrados' }}
        </p>
    </div>

    {{-- GRID DE CARDS RESPONSIVO --}}
    <div id="cards-container" class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">

        @foreach ($events as $event)
            {{-- A classe 'col' é o container para o grid. O card vai dentro. --}}
            <div class="col">
                {{-- A classe 'h-100' faz com que todos os cards na mesma linha tenham a mesma altura --}}
                <div class="card h-100 shadow-sm border-0">
                    <img src="/img/events/{{ $event->image }}" class="card-img-top" alt="{{ $event->title }}" style="height: 200px; object-fit: cover;">

                    {{-- d-flex e flex-column permitem que o botão fique no final com 'mt-auto' --}}
                    <div class="card-body d-flex flex-column">
                        <p class="card-text text-muted small">
                            <ion-icon name="calendar-outline"></ion-icon>
                            {{ date('d/m/Y', strtotime($event->date)) }}
                        </p>
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <p class="card-text small mb-3">
                            <ion-icon name="people-outline"></ion-icon>
                            {{ count($event->users) }} Participantes
                        </p>

                        {{-- 'mt-auto' empurra o botão para a base do card --}}
                        <a href="/events/{{ $event->id }}" class="btn btn-primary mt-auto">Saber mais</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- MENSAGEM PARA QUANDO NÃO HÁ EVENTOS (EMPTY STATE) --}}
    @if (count($events) == 0)
        <div class="text-center py-5">
            <ion-icon name="sad-outline" style="font-size: 5rem;" class="text-muted"></ion-icon>
            @if ($search)
                <h3 class="mt-3">Nenhum evento encontrado</h3>
                <p class="lead text-muted">Não foi possível encontrar resultados para "<strong>{{ $search }}</strong>".</p>
                <a href="/" class="btn btn-outline-primary mt-2">Ver todos os eventos</a>
            @else
                <h3 class="mt-3">Nenhum evento agendado</h3>
                <p class="lead text-muted">Ainda não há eventos disponíveis. Volte em breve!</p>
            @endif
        </div>
    @endif
</div>

@endsection
