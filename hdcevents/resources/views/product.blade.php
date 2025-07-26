@extends('layouts.main')
@section('title' , 'Produto NOVO')
@section('content')


@if ($id != null)
<p>Exibindo produtos id: {{$id}}</p><!-- entre {{}} significa que vem dos arquivos de rota--> {{-- --}}
@endif

@endsection
