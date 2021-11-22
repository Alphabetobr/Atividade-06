@extends('template')

@section('content')
@foreach($filmes as $Filmes)
@php
    $user=$Filmes->find($Filmes->id)->relUsers;
@endphp

<tr>
<th scope="row">{{$Filmes->id}}</th>
<td>{{$Filmes->title}}</td>
<td>{{$user->name}}</td>
<td>{{$Filmes->rating}}</td>
<td>{{$Filmes->about}}</td>
<td>
     <a href="{{url("lista/$Filmes->id")}}">
        <button class="btn btn-dark">Visualizar</button>
     </a> <br>
     <a href="{{url("lista/$Filmes->id/edit")}}">
        <button class= "btn btn-primary">Editar</button>
     </a><br>
     <a class="js-del" href="{{url("lista/$Filmes->id")}}">
        <button class="btn btn-dark">Deletar</button>
     </a><br>
</td>
</tr>
@endforeach
@endsection
