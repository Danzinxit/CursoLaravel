@extends('layouts.main')
@section('title' , 'Contato - DANZIN EVENTS')

@section('content')

<div class="container my-5">
    {{-- CABEÇALHO DA PÁGINA --}}
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold">Fale Conosco</h1>
        <p class="lead text-muted">
            Tem alguma dúvida, sugestão ou proposta? Adoraríamos ouvir você.
        </p>
    </div>

    <div class="row g-5">

        {{-- COLUNA DA ESQUERDA: INFORMAÇÕES DE CONTATO --}}
        <div class="col-lg-5">
            <div class="bg-light p-4 rounded-3 h-100">
                <h3 class="fw-bold mb-4">Informações de Contato</h3>

                <div class="d-flex align-items-start mb-4">
                    <ion-icon name="location-outline" class="h2 text-primary me-3 mt-1"></ion-icon>
                    <div>
                        <h5 class="mb-1">Endereço</h5>
                        <p class="text-muted mb-0">Avenida Principal, 123 - Centro<br>Contagem, MG - 32040-000</p>
                    </div>
                </div>

                <div class="d-flex align-items-start mb-4">
                    <ion-icon name="call-outline" class="h2 text-primary me-3 mt-1"></ion-icon>
                    <div>
                        <h5 class="mb-1">Telefone</h5>
                        <p class="text-muted mb-0">(31) 99999-8888</p>
                    </div>
                </div>

                <div class="d-flex align-items-start mb-4">
                    <ion-icon name="mail-open-outline" class="h2 text-primary me-3 mt-1"></ion-icon>
                    <div>
                        <h5 class="mb-1">E-mail</h5>
                        <p class="text-muted mb-0">contato@danzinevents.com.br</p>
                    </div>
                </div>

                <hr>

                <h5 class="fw-bold mt-4 mb-3">Siga-nos</h5>
                <div class="d-flex">
                    <a href="#" class="social-icon me-3 h2"><ion-icon name="logo-instagram"></ion-icon></a>
                    <a href="#" class="social-icon me-3 h2"><ion-icon name="logo-facebook"></ion-icon></a>
                    <a href="#" class="social-icon h2"><ion-icon name="logo-linkedin"></ion-icon></a>
                </div>
            </div>
        </div>

        {{-- COLUNA DA DIREITA: FORMULÁRIO DE CONTATO --}}
        <div class="col-lg-7">
            <div class="card border-0 shadow-sm p-4">
                <form action="/contact" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Seu Nome</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Seu E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="col-12">
                            <label for="subject" class="form-label">Assunto</label>
                            <input type="text" class="form-control" id="subject" name="subject" required>
                        </div>
                        <div class="col-12">
                            <label for="message" class="form-label">Sua Mensagem</label>
                            <textarea class="form-control" id="message" name="message" rows="6" required></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary w-100 py-2">
                                <ion-icon name="paper-plane-outline" class="me-2"></ion-icon>
                                Enviar Mensagem
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- SEÇÃO DO MAPA --}}
<div class="container-fluid mt-5 p-0">
    <div class="ratio ratio-16x9">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d60024.18392135689!2d-44.09349896068132!3d-19.9213346124578!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xa693e5a643808b%3A0x401663a23362161b!2sContagem%2C%20MG!5e0!3m2!1spt-BR!2sbr!4v1722637785233!5m2!1spt-BR!2sbr"
            style="border:0;"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
</div>

@endsection
