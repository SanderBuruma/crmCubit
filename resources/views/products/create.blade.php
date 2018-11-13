@extends('pages/home')

@section('title', '| Create Product')
@section('styles')

{!! Html::style('css/parsley.css') !!}

@endsection

@section('content')

<div class="row">
	<div class="col-md-8 offset-md-2">
		<h1>Create New Product</h1>
		<hr>
		{!! Form::open(['route' => 'products.store','data-parsley-validate' => '', 'method' => 'POST']) !!}
			{{ Form::label('name', 'Name:*') }}
			{{ Form::text('name', null, array('class' => 'form-control','required'=> '','maxlength'=>'255')) }}
			<br>
			{{ Form::label('price', 'Price:*') }}
			{{ Form::text('price', null, array('class' => 'form-control','required'=> '','maxlength'=>'255')) }}
			<br>
			{{ Form::submit('Create Product', array('class' => 'btn btn-success btn-lg btn-block', 'style'=>'margin-top: 20px;')) }}
		{!! Form::close() !!}
	</div>
</div>

@endsection

@section('scripts')

{!! Html::script('js/parsley.min.js') !!}

@endsection