@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-0">
			<div class="panel panel-default">
				<div class="panel-heading">Ingrese los siguientes valores:</div>

		        @if($errors->has())
		            <div class='alert alert-danger'>
		                <!--recorremos los errores en un loop y los mostramos-->
		                <h4 class="header smaller lighter red">Error</h4>
		                @foreach ($errors->all('<p>:message</p>') as $message)
		                    {!! $message !!}
		                @endforeach
		            </div>

		        @endif

				{!! Form::model( null , $form_data) !!}
				<div class="panel-body">
					<div class="input-group">
                            {!! Form::text('weight', null, ['placeholder' => 'Peso (kg)', 'template' => 'clean','class' => 'form-control', 'id' => 'weight']) !!}
                    </div>

                    <br>

                    <div class="input-group">
                            {!! Form::text('height', null, ['placeholder' => 'Altura (m)', 'template' => 'clean','class' => 'form-control', 'id' => 'weight']) !!}
                    </div>

                    <br>
                    
                    <div class="input-group-btn">
                        <button type="submit" id="add-event-btn" class="btn btn-effect-ripple btn-primary" style="overflow: hidden; position: relative;">Calcular</button>
                    </div>
				</div>
				{!! Form::close() !!}
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">Resultado:</div>
					
					@if(Session::has('resultado'))
					            <div class="alert alert-success">
					                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					                    <span class="glyphicon glyphicon-ok"></span> <strong>Mensaje de Éxito</strong>
					                            <hr class="message-inner-separator">
					                            <p> {!! Session::get('resultado') !!}</p>
					            </div>
					@endif

			</div>	
		</div>
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading">Historial</div>

				<div class="panel-body">
					
				<table id="general-table" class="table table-vcenter table-striped table-condensed table-hover">
					<thead>
						<tr>
							<th>Peso</th>
							<th>Altura</th>
						</tr>
					</thead>
					<tbody>
						@foreach($valores as $valor)
							<tr>
								<td>{{ $valor->weight }}</td>
								<td>{{ $valor->height }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>

						<div class="row">
						    <div class="col-xs-12">
				                {!! $valores->render() !!}
				            </div>
						</div>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
