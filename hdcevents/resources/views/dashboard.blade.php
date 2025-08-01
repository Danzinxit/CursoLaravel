@extends('layouts.main')
@section('title' , 'Dashboard')
@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
 <h1>Meus eventos</h1>
</div>

<div class="col-md-10 offset md-1 dashboard-title-container">
    @if (count($events) > 0)
    @else
    <p>Voce ainda nao tem eventos, <a href="/events/create">crie um agora"></a></p>
    @endif

</div>




@endsection
