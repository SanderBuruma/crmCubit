@extends('pages/home')

@section ('title', '| Edit Customer')

@section('styles')

{!! Html::style('css/parsley.css') !!}

@endsection

@section('content')

<div class="row">
		<div class="col-md-8 offset-md-2">
			<h1>Edit Customer</h1>
			<hr>
{{ Form::model($customer, ['route' => ['customers.update', $customer->id], 'method' => "PUT"]) }}

	{{ Form::label('fname', 'First Name:') }}
	{{ Form::text('fname', null, ['class' => 'form-control']) }}
	<br>
	{{ Form::label('lname', 'Last Name:') }}
	{{ Form::text('lname', null, ['class' => 'form-control']) }}
	<br>
	{{ Form::label('address', 'Address:') }}
	{{ Form::text('address', null, ['class' => 'form-control']) }}
	<br>
	{{ Form::label('city', 'City:') }}
	{{ Form::text('city', null, ['class' => 'form-control']) }}
	<br>
	{{ Form::label('phone1', 'Phone nr 1:') }}
	{{ Form::text('phone1', null, ['class' => 'form-control']) }}
	<br>
	{{ Form::label('phone2', 'Phone nr 2:') }}
	{{ Form::text('phone2', null, ['class' => 'form-control']) }}
	<br>
	{{ Form::label('email', 'E-Mail:') }}
	{{ Form::text('email', null, ['class' => 'form-control']) }}
	<br>
	{{ Form::label('balance', 'Balance:') }}
	{{ Form::text('balance', null, ['class' => 'form-control']) }}
	<br>

	{{ Form::submit('Save Changes', ['class' => 'btn btn-success']) }}

{{ Form::close() }}
</div>
</div>

@stop

@section('scripts')

{!! Html::script('js/parsley.min.js') !!}

@endsection