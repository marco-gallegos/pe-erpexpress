@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>CANOVENTAS</title>
</head>
<body>
<div class="col-sm-offset-3 col-sm-6">
    <div class ="panel-title">
        <h1>Proveedor</h1>
    </div>
    <div class="panel-body">
        <form action="{{ url('proveedores') }}/{{ $proveedores->RFC }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <div class="from-group">
                <label for=>"RFC"</label>
                <input type="text" class="form-control" name="rfc" value="{{ $proveedores->RFC }}">
            </div>
            <div class="from-group">
                <label for=>"Nombre"</label>
                <input type="text" class="form-control" name="nombre" value="{{ $proveedores->razonSocial }}">
            </div>
            <div class="from-group">
                <label for=>"Apellidos"</label>
                <input type="text" class="form-control" name="apellidos" value="{{ $proveedores->apellido }}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default">
                    <i class="fa fa-plus"></i> Editar proveedor
                </button>  
            </div>
        </form>   
    </div>
</div>
</body>
</html>
@endsection