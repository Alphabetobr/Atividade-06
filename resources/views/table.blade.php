@extends('template')

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="{{ asset('css/table.css') }}" rel="stylesheet">
@section('content')

 <div class="hm-gradient">

    <main>

        <!--MDB Tables-->
        <div class="container mt-4"; class="col-8 m-auto">

            <div class="text-center darken-grey-text mb-4">
                <h1 class="font-bold mt-4 mb-3 h5">RELAÇÃO USUÁRIOS E FILMES</h1>
                <a class="btn btn-danger btn-md" href="{{route('painel.page')}}" target="_blank">Voltar á tela home<i></i></a>
            </div>
            <div class="text-center">



                <a href="{{url('Filmes/create')}}">

                 <button class="btn btn-success">Cadastrar</button>
             </a>

             <a href="{{url('Filmes/show')}}">

                <button class="btn btn-success">mostrar</button>
            </a>


            </div>
            <br>
            <div class="card mb-4">

                <div class="card-body">

                    <!-- Grid row -->

                    <div class="row">
                        <!-- Grid column -->
                        <div class="col-md-12">
                            <h2 class="pt-3 pb-4 text-center font-bold font-up deep-purple-text">Search within table</h2>
                            <div class="input-group md-form form-sm form-2 pl-0">
                                <input class="form-control my-0 py-1 pl-3 purple-border" type="text" placeholder="Search something here..." aria-label="Search">
                                <span class="input-group-addon waves-effect purple lighten-2" id="basic-addon1"><a><i class="fa fa-search white-text" aria-hidden="true"></i></a></span>
                            </div>
                        </div>
                        <!-- Grid column -->
                    </div>
                    <!-- Grid row -->
                <div>
                    @csrf
                    <table class="table table-striped">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Título</th>
                                <th>Usuário</th>
                                <th>Nota</th>
                                <th>Sobre</th>
                            </tr>
                        </thead>
                        <!--Table head-->
                        <!--Table body-->
                        <tbody>
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


                        </tbody>
                        <!--Table body-->
                    </table>
                    <!--Table-->
                </div>
            </div>
        </div>
    </main>
</div>
@endsection
