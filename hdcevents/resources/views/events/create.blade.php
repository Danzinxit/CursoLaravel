@extends('layouts.main')
@section('title' , 'Criar Evento')
@section('content')

<div class="col-md-8 offset-md-2 mb-5">
    <div class="card shadow-sm">
        <div class="card-header bg-light py-3">
            <h1 class="text-center h3 mb-0">Crie o seu evento</h1>
        </div>
        <div class="card-body p-4">
            <form action="/events" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Campo de Imagem --}}
                <div class="mb-3">
                    <label for="image" class="form-label">Imagem do Evento:</label>
                    <input type="file" id="image" name="image" class="form-control" required>
                </div>

                {{-- Campo de Título --}}
                <div class="mb-3">
                    <label for="title" class="form-label">Nome do Evento:</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Ex: Show do Metallica" required>
                </div>

                {{-- Campo de Data --}}
                <div class="mb-3">
                    <label for="date" class="form-label">Data do Evento:</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>

                {{-- Campo de Cidade --}}
                <div class="mb-3">
                    <label for="city" class="form-label">Cidade:</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="Ex: Belo Horizonte" required>
                </div>

                {{-- Campo de Privacidade --}}
                <div class="mb-3">
                    <label for="private" class="form-label">O evento é privado?</label>
                    <select name="private" id="private" class="form-select"> {{-- Usar form-select para selects --}}
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
                    </select>
                </div>

                {{-- Campo de Descrição --}}
                <div class="mb-4">
                    <label for="description" class="form-label">Descrição:</label>
                    <textarea name="description" id="description" class="form-control" rows="5" placeholder="Descreva em detalhes o que vai acontecer no evento..." required></textarea>
                </div>

                {{-- Itens de Infraestrutura (Checkboxes) --}}
                <div class="mb-4">
                    <label class="form-label">Adicione itens de infraestrutura:</label>
                    {{-- Estrutura moderna do Bootstrap 5 para checkboxes --}}
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="items[]" value="Cadeiras" id="itemCadeiras">
                        <label class="form-check-label" for="itemCadeiras">Cadeiras</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="items[]" value="Palco" id="itemPalco">
                        <label class="form-check-label" for="itemPalco">Palco</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="items[]" value="Cerveja Grátis" id="itemCerveja">
                        <label class="form-check-label" for="itemCerveja">Cerveja Grátis</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="items[]" value="Open Food" id="itemOpenFood">
                        <label class="form-check-label" for="itemOpenFood">Open Food</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="items[]" value="Brindes" id="itemBrindes">
                        <label class="form-check-label" for="itemBrindes">Brindes</label>
                    </div>
                </div>

                {{-- Botão de Envio --}}
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg d-flex align-items-center justify-content-center">
                        <ion-icon name="add-circle-outline" class="me-2"></ion-icon>
                        Criar Evento
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
