@extends('layouts.adminlte')

@section('content')
	<div class="row">
		<div class="col-xs-12">
			<form action="{{ url('reportes/facturasproveedor') }}" method="post" accept-charset="utf-8">
				<div class="form-group">
					<label>Cliente</label>
					<select name="cliente" multiple class="form-control" required="true">
						@foreach ($proveedores as $proveedor)
							<option value="{{ $proveedor->RFC }}">{{ $proveedor->razonSocial }}</option>}
						@endforeach
					</select>
				</div>
				{{ csrf_field() }}
				<button type="submit">Ver Reporte</button>
			</form>
		</div>
	</div>
	@if (isset($facturas[0]))
		<h2>Facturas que nos expedidio {{ $facturas[0]->razonSocial }}</h2>
		<button type="button" onclick="window.print()"><span class="glyphicon glyphicon-print"></span>Imprimir</button>
		<table id="dataTable">
			<thead>
				<tr>
					<th>Folio</th>
					<th>Fecha</th>
					<th>Total</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($facturas as $factura)
					<tr>
						<td>{{ $factura->Folio }}</td>
						<td>{{ $factura->fecha }}</td>
						<td>{{ $factura->total }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	@else
		<h2>Sin facturas</h2>
	@endif
@endsection