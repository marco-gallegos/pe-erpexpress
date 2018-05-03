@extends ('layouts.app')
@section ('content')
<!DOCTYPE html>
<html>
<head>
    <title>ERPEXPRESS</title>
</head>
<body>
<div class="col-sm-offset-3 col-sm-6">
    <div class ="panel-title">
        <h1>Cliente</h1>
    </div>
    <div class="panel-body">
        <form action="{{ url('clientes') }}/{{ $clientes->Rfc }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <div class="from-group">
                <label for=>"RFC"</label>
                <input type="text" class="form-control" name="rfc" value="{{ $clientes->Rfc }}">
            </div>
            <div class="from-group">
                <label for=>"Nombre"</label>
                <input type="text" class="form-control" name="nombre" value="{{ $clientes->nombre }}">
            </div>
            <div class="from-group">
                <label for=>"Apellidos"</label>
                <input type="text" class="form-control" name="apellidos" value="{{ $clientes->apellidos }}">
            </div>
            <div class="from-group">
                <label for=>"Saldo"</label>
                <input type="text" class="form-control" name="saldo" value="{{ $clientes->saldo }}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Editar cliente
                </button>  
            </div>
        </form>   
    </div>
</div>
</body>
</html>
@endsection