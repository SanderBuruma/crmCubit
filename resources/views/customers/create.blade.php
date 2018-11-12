@extends('pages/home')

@section('title', '| Customers | Create')
@section('styles')

{!! Html::style('css/parsley.css') !!}

@endsection

@section('content')

<div class="row">
	<div class="col-md-8 offset-md-2">
		<h1>Create New Customer</h1>
		<hr>
		{!! Form::open(['route' => 'customers.store','data-parsley-validate' => '', 'method' => 'POST']) !!}
			{{ Form::label('fname', 'First Name:*') }}
			{{ Form::text('fname', null, array('class' => 'form-control','required'=> '','maxlength'=>'255')) }}
			<br>
			{{ Form::label('lname', 'Last Name:*') }}
			{{ Form::text('lname', null, array('class' => 'form-control','required'=> '','maxlength'=>'255')) }}
			<br>
			{{ Form::label('address', 'Address:*') }}
			{{ Form::text('address', null, array('class' => 'form-control','required'=> '','maxlength'=>'255')) }}
			<br>
			{{ Form::label('city', 'City:*') }}
			{{ Form::text('city', null, array('class' => 'form-control','required'=> '','maxlength'=>'255')) }}
			<br>
			{{ Form::label('phone1', 'Phone Nr 1:*') }}
			{{ Form::text('phone1', null, array('class' => 'form-control','required'=> '','maxlength'=>'255')) }}
			<br>
			{{ Form::label('phone2', 'Phone Nr 2:') }}
			{{ Form::text('phone2', null, array('class' => 'form-control','maxlength'=>'255')) }}
			<br>
			{{ Form::label('email', 'E-Mail:*') }}
			{{ Form::email('email', null, array('class' => 'form-control','required'=> '','maxlength'=>'255')) }}
			<br>
			{{ Form::label('balance:', 'Balance:*') }}
			{{ Form::text('balance', null, array('class' => 'form-control','required'=> '','maxlength'=>'255')) }}
			<br>
			{{ Form::submit('Create Customer', array('class' => 'btn btn-success btn-lg btn-block', 'style'=>'margin-top: 20px;')) }}
		{!! Form::close() !!}
	</div>
</div>

@endsection

@section('scripts')

{!! Html::script('js/parsley.min.js') !!}

@endsection