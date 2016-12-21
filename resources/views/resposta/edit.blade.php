@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel">
            @if(Session::has('message'))
                <div class="alert alert-info panel-heading">{{ Session::get('message') }}</div>
            @endif
            <div class="col-md-3"></div>
            <div class="col-md-6 jumbotron-fluid">
                <form action="{{ route('resposta.update', ['id'=>$resposta->id])  }}" method="PATCH">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="descricao">Descricao</label>
                            <textarea type="text" id="descricao" name="descricao" class="form-control row">{{ $resposta->descricao }}</textarea>
                            <label for="estado">Estado</label>
                            <select name="estado" id="estado">
                                <option value="Activo">Activo</option>
                                <option value="Desactivo">Desactivo</option>
                            </select>
                            <input name="idMensagem" id="idMensagem" class="form-control row" type="hidden" value="{{ $resposta->idMensagem }}">

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