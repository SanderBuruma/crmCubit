@extends('pages/home')

@section('title', '| Edit Order')
@section('styles')

{!! Html::style('css/parsley.css') !!}

@endsection

@section('content')

<div class="row">
	<div class="col-md-8 offset-md-2">
		<h1>Edit Order: {{ $order->id }}</h1>
		<hr>
		{{ Form::model($order, ['route' => ['orders.update', $order->id], 'method' => "PUT"]) }}
			{{ Form::label('customers_id', 'Customer:*') }}
			{{ Form::select('customers_id', $customers, null, ['class' => 'form-control'])}}
			<br>

			{{ Form::label('products_id', 'Product:*') }}
			{{ Form::select('products_id', $products, null, ['class' => 'form-control'])}}
			<br>

			{{ Form::label('quantity', 'Quantity:*') }}
			{{ Form::number('quantity', null, array('class' => 'form-control','required'=> '','maxlength'=>'15')) }}
			<br>
			
			{{ Form::submit('Create Order', array('class' => 'btn btn-success btn-lg btn-block', 'style'=>'margin-top: 20px;')) }}
		{{ Form::close() }}
	</div>
</div>

@stop

@section('scripts')

{!! Html::script('js/parsley.min.js') !!}

@endsection