@extends('layouts.app')

@section('title', 'Page Title')

@include('layouts.menu')

@section('content')

    <h2 class="text-center">Listar Año Escolar</h2>

	<div class="col-sm-9">
		<div class="col-sm-8 col-sm-offset-2">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>Año Escolar</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($anoEscolar as $anoEsc)
						<tr>
							<td>{{ $anoEsc->id }}</td>
							<td>{{ $anoEsc->nombre_ano }}</td>
							@if($anoEsc->status == "enable")
								<td><p class="message-success">Habilitado</p></td>
								<td>
									<a href="{{url('/listar-ano-escolar-disable/'.$anoEsc->id)}}"><button type="button" class="btn btn-danger">Inhabilitar</button></a>
								</td>
							@else
								<td><p class="message-danger">Inhabilitado</p></td>
								<td>
                                	<a href="{{url('/listar-ano-escolar-enable/'.$anoEsc->id)}}"><button type="button" class="btn btn-primary">Habilitar</button></a>
                            	</td>
							@endif
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

@endsection