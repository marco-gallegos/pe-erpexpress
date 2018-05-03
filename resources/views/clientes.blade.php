@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>ERPEXPRESS</title>
</head>
<body>
<div class="col-sm-offset-3 col-sm-6">
    <div class ="panel-title">
        <h1 style="color: #56838A">Cliente</h1>
    </div>
    <div class="panel-body">
        <form action="{{ url('clientes/create') }}" method="POST" role="form">
            <fieldset>
            {{ csrf_field() }}
            <div class="from-group">
                <label for=>RFC</label>
                <input type="text" class="form-control" name="rfc">
            </div>
            <div class="from-group">
                <label for=>Nombre</label>
                <input type="text" class="form-control" name="nombre">
            </div>
            <div class="from-group">
                <label for=>Apellidos</label>
                <input type="text" class="form-control" name="apellidos">
            </div>
             <div class="from-group">
                <label for=>Saldo</label>
                <input type="text" class="form-control" name="saldo">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus">Registrar cliente</i>
                </button>  
            </div>
        </fieldset>
        </form>  
    </div>
</div>
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado de Clientes</h3>
        </div>
    </div>
    <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>RFC</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Saldo</th>
                    <th>Accion</th>
                </thead>
               @foreach ($clientes as $cli)
                <tr>
                    <td>{{ $cli->Rfc}}</td>
                    <td>{{ $cli->nombre}}</td>
                    <td>{{ $cli->apellidos}}</td>
                    <td>{{ $cli->saldo}}</td>
                    <td>
                        <button type="submit" class="btn btn-info" onclick="location.href='clientes/{{ $cli->Rfc }}'">Editar</button>
                        <form action="{{ url('clientes') }}/{{ $cli->Rfc }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    </div>
</body>
</html>
@endsection