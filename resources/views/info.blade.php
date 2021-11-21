@extends('template')

@section('content')

    <h1 class="text-center"> Visualisar</h1>
    <div class="col-8 m-auto">
    @php
        $user=$filmes->find($filmes->id)->relUsers;
    @endphp
    Título :{{$filmes->title}}<br>
    Usuário:{{$user->name}}<br>
    Email  :{{$user->email}}<br>
    Nota   :{{$filmes->rating}}<br>
    Sobre  :{{$filmes->about}}<br>
    </div>
@endsection
