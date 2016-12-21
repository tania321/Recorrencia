@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="panel">
            @if(Session::has('message'))
                <div class="alert alert-info panel-heading">{{ Session::get('message') }}</div>
            @endif
            <div class="col-md-3"></div>
            <div class="col-md-6 jumbotron-fluid">
                <form action="{{ route('mensagem.store')  }}" method="POST">
                    <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="descricao">Descricao</label>
                            <input type="text" id="descricao" name="descricao" class="form-control row">
                            <label for="estado">Descricao</label>
                            <select name="estado" id="estado" class="form-control row">
                                <option value="Activo">Activo</option>
                                <option value="Desactivo">Encerrado</option>
                            </select>
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