@extends('template')


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<link href="{{ asset('css/pattern.css') }}" rel="stylesheet">
@section('content')
<body>
<div class="wrapper fadeInDown">
        <div id="formContent">
    <div>
        @if (@isset($errors) && count($errors)>0)
        <div class="text-center mt-4 mb-4 p-2 alert-danger">
            @foreach ($errors->all() as $erro)
            {{$erro}}<br>
            @endforeach
        </div>
        @endif

        <div class="fadeIn first">
            <h2>@if(isset($filmes))Edição de Dados @else Cadastro @endif</h2>
        </div><br>

        @if(isset($filmes))
            <form name="formEdit" id="formEdit" method="post" action="{{url("Filmes/$filmes->id")}}">
                @method('PUT')
            @else
            <form name="formaCad" id="formCad" method="post" action="{{url("Filmes")}}">

        @endif
        @csrf
        <input type="text" name="title" id="title" placeholder="Título:" value="{{$filmes->title ?? ''}}"required>
        <select name="user_id" id="user_id"required>
            <option value="{{$filmes->relUsers->id ?? ''}}">{{$filmes->relUsers->name ?? 'Nome de Usuário'}} </option>
            @foreach ($User as $users)
            <option value="{{$users->id}}">{{$users->name}}</option>
            @endforeach
        </select><br>
        <input type="integer" name="rating" id="rating" placeholder="Nota:" value="{{$filmes->rating ?? ''}}" required>
        <input type="text" name="about" id="about" placeholder="Sobre:" value="{{$filmes->about ?? ''}}" required>
        <input type="submit" value="@if(isset($filmes))Editar @else Cadastrar @endif">


    </form>
    <div id="formFooter">
      </div>
    </div>
    </div>
        </div>


</body>
@endsection
