@extends('layouts.main')
@section('title', 'Dashboard')

@section('content')
<div class="bg-light min-vh-100 py-5">
    <div class="container">

        {{-- Cabeçalho --}}
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4">
            <div>
                <h1 class="display-5 fw-bold">Meus Eventos</h1>
                <p class="text-muted">Gerencie todos os eventos que você criou.</p>
            </div>
            <a href="/events/create" class="btn btn-primary btn-lg d-flex align-items-center mt-3 mt-md-0 shadow-sm">
                <i class="bi bi-plus-lg me-2"></i>
                Criar Novo Evento
            </a>
        </div>

        {{-- Tabela de Eventos Criados pelo Usuário --}}
        <div class="card shadow-sm border-0 rounded-4 mb-5">
            <div class="card-body p-0">
                @if($events->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" class="ps-4">#</th>
                                    <th scope="col">Nome Evento</th>
                                    <th scope="col">Participantes</th>
                                    <th scope="col" class="text-end pe-4">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($events as $event)
                                    <tr>
                                        <td class="ps-4">{{ $loop->iteration }}</td>
                                        <td class="fw-semibold">
                                            <a href="/events/{{ $event->id }}" class="text-decoration-none text-dark">
                                                {{ $event->title }}
                                            </a>
                                        </td>
                                        <td>{{ count($event->users) }}</td>
                                        <td class="text-end pe-4">
                                            <div class="d-flex justify-content-end gap-2">
                                                <a href="/events/edit/{{ $event->id }}" class="btn btn-outline-primary btn-sm">
                                                    <i class="bi bi-pencil"></i> Editar
                                                </a>
                                                <form action="/events/{{$event->id}}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este evento?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm">
                                                        <i class="bi bi-trash"></i> Excluir
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="bi bi-folder2-open display-1 text-muted"></i>
                        <h3 class="mt-3 fw-bold">Nenhum evento criado</h3>
                        <p class="text-muted">Comece criando seu primeiro evento agora mesmo.</p>
                        <a href="/events/create" class="btn btn-primary btn-lg mt-3 shadow-sm">
                            <i class="bi bi-plus-lg me-2"></i>
                            Criar Primeiro Evento
                        </a>
                    </div>
                @endif
            </div>
        </div>

        {{-- Seção de Eventos que o Usuário Participa --}}
        <div class="mb-4">
            <h1 class="display-5 fw-bold">Eventos que estou participando</h1>
            <p class="text-muted">Gerencie os eventos em que você se inscreveu.</p>
        </div>

        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-body p-0">
                {{-- CORREÇÃO: Removido o ':' do final do @if e o espaço extra --}}
                @if(count($eventsasparticipant) > 0)
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" class="ps-4">#</th>
                                    <th scope="col">Nome Evento</th>
                                    <th scope="col">Participantes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($eventsasparticipant as $event)
                                    <tr>
                                        <td class="ps-4">{{ $loop->iteration }}</td>
                                        <td class="fw-semibold">
                                            <a href="/events/{{ $event->id }}" class="text-decoration-none text-dark">
                                                {{ $event->title }}
                                            </a>
                                        </td>
                                        <td>{{ count($event->users) }}</td>
                                                   <td>
                                                    <form action="/events/leave/{{$event->id}}" method="POST">
                                                    @csrf
                                                    @method("DELETE")
                                                    <button type="submit" class="btn btn-danger delete-btn">
                                                         <i class="bi bi-box-arrow-right"></i> Sair do Evento
                                                    </button>
                                                    </form>
                                                   </td>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                {{-- CORREÇÃO: Sintaxe correta para o @else --}}
                @else
                    <div class="text-center py-5">
                         <i class="bi bi-calendar-x display-1 text-muted"></i>
                        <h3 class="mt-3 fw-bold">Você não está participando de nenhum evento</h3>
                        <p class="text-muted">
                            <a href="/">Veja todos os eventos</a> e participe de algum!
                        </p>
                    </div>
                {{-- CORREÇÃO: Removido o ';' do final --}}
                @endif
            </div>
        </div>

    </div>
</div>
@endsection
