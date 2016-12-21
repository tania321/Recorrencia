@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel">
            <div class="page-header">
                {{ $mensagem->descricao }}
            </div>
            <div class="panel-body">
                @foreach($comentarios as $comentario)
                    <div class="jumbotron">
                        <div class="col-md-3">
                            <p><h4>{{ $comentario->descricao }}</h4> </p>
                        </div>
                        <div class="col-md-3">
                            <p><h6>{{ $comentario->user_id }}</h6></p>
                        </div>
                        <div class="col-md-6">
                            <a> <td> Reclamacao para aumento de salario</td></a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('resposta.edit', ['id'=>$comentario->id]) }}" class="btn btn-outline-primary">Encerrar Reclamacao Activa</a>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </div>
@endsection