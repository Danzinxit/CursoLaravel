<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" type="image/x-icon" href="/img/cruzeiro.svg">
    <link rel="stylesheet" href="/css/styles.css">
    <script src="/js/scripts.js"></script>
</head>
<body>
    <div>

        <h1>ola</h1>
        <img src="/img/palestra.jpg" alt="">
        @if(10 > 15)
            <p>A condicao e true</p>
        @else <p>A condicao e false</p>
            @endif

            <p>{{$nome}}</p>
            @if($nome == "Daniel")
            <p>o nome e Daniel e ele tem {{$idade}} anos e trabalha com {{$trabalho}}</p>
            @elseif($nome == "Matheus")
            <p>o nome e Matheus e ele tem {{$idade}} anos</p>
            @else
            <p>O nome nao e Matheus</p>
            @endif

            @for ($i = 0; $i < count($array);$i++)
                <p>{{ $array[$i] }} - {{$i}}</p>
                @if ($i == 2)
                    <p>O i e {{$i}}</p>
                @endif
            @endfor
            @foreach ($array2 as $valores )
                {{$loop->index}} <!-- Loop do foreach--> {{-- --}}
                <p>{{$valores}}</p>
            @endforeach
            <!-- Outro exemplo foreach--> {{-- --}}
            @foreach ($vetor as $estado=> $capital )
                <p>A capital de {{$estado}} e {{$capital}} </p>
            @endforeach
            @php
            $name = "Daniel";
            echo $name;
            @endphp
            <!-- O que esta emm baixo e para o comentario nao aparecer no console -->
            {{-- --}}
    </div>


</body>
</html>
<style>

    body{
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif
    }
</style>
