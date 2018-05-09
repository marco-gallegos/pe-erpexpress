@extends('layouts.adminlte')

@section('content')
	<div class="row">
		<div class="col-xs-12">
			<h2>Crear Factura Compra</h2>
			<form action="{{ url('facturaCompra') }}" method="post" accept-charset="utf-8">
				<div class="form-group">
					<h2>Proveedores</h2>
					<table class="table-hover table table-bordered" id="dataTable">
						<thead>
							<tr>
								<th>Nombre</th>
								<th>Rfc</th>
								<th>Seleccion</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($proveedores as $proveedor)
								<tr>
									<td>{{ $proveedor->razonSocial }} {{ $proveedor->apellido }}</td>
									<td>{{ $proveedor->RFC }}</td>
									<td><input type="radio" name="proveedorrfc" value="{{ $proveedor->RFC }}" placeholder=""></td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				{{ csrf_field() }}
				<button type="submit" class="btn btn-success form-control">Enviar</button>
			</form>
		</div>
	</div>
@endsection