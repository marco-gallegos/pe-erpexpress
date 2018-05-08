@extends('layouts.adminlte')

@section('content')
	<div class="row">
		<div class="col-xs-12">
			<h2>Crear Factura</h2>
			<form action="{{ url('factura') }}" method="post" accept-charset="utf-8">
				<div class="form-group">
					<label>Creador</label>
					<input type="hidden" value="{{ Auth::user()->id }}" name="empleado">
					<input type="text" name="" value="{{ Auth::user()->name }}" placeholder="" disabled="true">
				</div>
				<div class="form-group">
					<h2>Clientes</h2>
					<table class="table-hover table table-bordered" id="dataTable">
						<thead>
							<tr>
								<th>Nombre</th>
								<th>Rfc</th>
								<th>Seleccion</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($clientes as $cliente)
								<tr>
									<td>{{ $cliente->nombre }} {{ $cliente->apellidos }}</td>
									<td>{{ $cliente->Rfc }}</td>
									<td><input type="radio" name="clienterfc" value="{{ $cliente->Rfc }}" placeholder=""></td>
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