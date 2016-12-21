@extends('layouts.index')

@section('content')
    <div class="container">
        <div class="row col-md-pull-3">
            @if(Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
            <a href="{{ route('mensagem.create') }}">Registar Reclamacao</a>

                @foreach($mensagens as $mensagem)
                        <div class="card card-block col-lg-offset-3 col-md-6">
                            <div class="card-text">
                                <h4>{{ $mensagem->descricao }}</h4>
                            </div>
                            <div>
                                <div class="col-md-3"><h6><a class="card-link" href="{{ route('mensagem.show', ['id'=>$mensagem->id]) }}"> </a></h6></div>

                                <div class="col-md-6">
                                    <a href="{{ route('mensagem.destroy', ['id'=>$mensagem->id]) }}" class="btn btn-outline-danger"> Reclamacoes Activos </a>

                                    <div> <a>   </div>
                                    <a href="{{ route('mensagem.destroy', ['id'=>$mensagem->id]) }}" class="btn btn-outline-danger"> Reclamacoes  Encerrados </a>

                                </div>
                            </div>


                        </div>

                @endforeach

        </div>
    </div>

@endsection