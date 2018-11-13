@extends('pages/home')

@section('title', '| Create Order')
@section('styles')

{!! Html::style('css/parsley.css') !!}

@endsection

@section('content')

<div class="row">
	<div class="col-md-8 offset-md-2">
		<h1>Create New Order</h1>
		<hr>
		{!! Form::open(['route' => 'orders.store','data-parsley-validate' => '', 'method' => 'POST']) !!}
			{{ Form::label('customers_id', 'Customer:*') }}
			<select name="customers_id" class="form-control">
				@foreach($customers as $customer)
					<option value="{{ $customer->id }}">{{$customer->id}} - {{$customer->fname}} {{$customer->lname}}</option>
				@endforeach
			</select> 
			<br>
			{{ Form::label('products_id', 'Product:*') }}
			<select name="products_id" class="form-control">
				@foreach($products as $product)
				<option value="{{ $product->id }}">{{$product->id}} - {{$product->name}} - €{{$product->price}}</option>
				@endforeach
			</select> 
			<br>
			{{ Form::label('quantity', 'Quantity:*') }}
			{{ Form::number('quantity', null, array('class' => 'form-control','required'=> '','maxlength'=>'15')) }}
			<br>
			{{ Form::submit('Create Order', array('class' => 'btn btn-success btn-lg btn-block', 'style'=>'margin-top: 20px;')) }}
		{!! Form::close() !!}
	</div>
</div>

@endsection

@section('scripts')

{!! Html::script('js/parsley.min.js') !!}

@endsection