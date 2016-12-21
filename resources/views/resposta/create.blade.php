@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel">
            @if(Session::has('message'))
                <div class="alert alert-info panel-heading">{{ Session::get('message') }}</div>
            @endif
            <div class="col-md-3"></div>
            <div class="col-md-6 jumbotron-fluid">
                <form action="{{ route('resposta.store')  }}" method="POST">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="descricao">Descricao</label>
                            <textarea type="text" id="descricao" name="descricao" class="form-control row"></textarea>
                            <input name="estado" id="estado" class="form-control row" type="hidden" value="Activo">
                            <input name="idMensagem" id="idMensagem" class="form-control row" type="hidden" value="{{ $mensagem->id }}">

                            <div>
                                <input type="submit" class="btn btn-success btn-group-justified row" value="Enviar">
                            </div>

                        </div>
                    </div>
                </form>
            </div>


        </div>
    </div>

@endsection