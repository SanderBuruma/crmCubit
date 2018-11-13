@extends('pages/home')

@section('title', '| Insert Customer')
@section('styles')


@endsection

@section('content')

<div class="row">
	<div class="col-md-8 offset-md-2">
		{{ "$customer->fname $customer->lname" }}
		{!! Form::open(['route' => ['customers.destroy', $customer->id], 'method' => 'DELETE']) !!}
					
		{!! Form::submit('Delete', ['class'=>'btn btn-danger btn-block ']) !!}
		
		{!! Form::close() !!}
	</div>
</div>

@endsection

@section('scripts')


@endsection