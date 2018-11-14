@extends('pages/home')

@section('tite', '| Products | Index')

@section('content')

<div class="row">
	<div class="col-md-9">
		<h1>All Products</h1>
	</div>

	<div class="col-md-3">
		<a href="{{ route('products.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">New Product</a>
	</div>
	<hr>
	<div class="col-md-12">
		<hr>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<table class="table">
			<thead>
				<th>#</th>
				<th>Name</th>
				<th>Price</th>
				<th>Created</th>
				<th></th>
			</thead>

			<tbody>

				@foreach( $products as $product )
					<tr>
						<th>{{ $product->id }}</th>
						<td>{{ $product->name }}</td>
						<td>€{{ $product->price }},-</td>
						<td>{{date('M j, Y', strtotime( $product->created_at ))}}</td>
						<td>
							<a href="{{ route('products.show', $product->id) }}"><i class="fas fa-eye"></i></a> 
							<a href="{{ route('products.edit', $product->id) }}"><i class="fas fa-pencil-alt"></i></a>
						</td>
					</tr>
				@endforeach

			</tbody>
		</table>
		<div class="mx-auto">
			{!! $products->links() !!}
		</div>
	</div>
</div>

@stop