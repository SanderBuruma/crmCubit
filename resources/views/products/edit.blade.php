@extends('pages/home')

@section('title', '| Edit Product')
@section('styles')

{!! Html::style('css/parsley.css') !!}

@endsection

@section('content')

<div class="row">
	<div class="col-md-8 offset-md-2">
		<h1>Edit Product</h1>
		<hr>
		{{ Form::model($product, ['route' => ['products.update', $product->id], 'method' => "PUT"]) }}

			{{ Form::label('name', 'Name:*') }}
			{{ Form::text('name', null, ['class' => 'form-control']) }}
			<br>
			{{ Form::label('price', 'Price:*') }}
			{{ Form::text('price', null, ['class' => 'form-control']) }}
			<br>

			{{ Form::submit('Save Changes', ['class' => 'btn btn-success']) }}

		{{ Form::close() }}
</div>
</div>

@stop

@section('scripts')

{!! Html::script('js/parsley.min.js') !!}

@endsection