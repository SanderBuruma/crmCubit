@extends('pages/home')

@section('tite', '| Orders | Index')

@section('content')

<div class="row">
	<div class="col-md-9">
		<h1>All Orders</h1>
	</div>

	<div class="col-md-3">
		<a href="{{ route('orders.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">New Order</a>
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
				<th>Customer & ID</th>
				<th>Product & ID</th>
				<th>Quantity</th>
				<th>Created</th>
				<th></th>
			</thead>

			<tbody>

				@foreach( $orders as $order )
					<tr>
						<th>{{ $order->id }}</th>
						<th>{{ $order->customers->fname }} - {{ $order->customers->id }}</th>
						<td>{{ $order->products->name }} - {{ $order->products->id }}</td>
						<td>{{ $order->quantity }}</td>
						<td>{{date('M j, Y', strtotime( $order->created_at ))}}</td>
						<td><a href="{{ route('orders.edit', $order->id) }}"><i class="fas fa-pencil-alt"></i></a> <a href="{{ route('orders.destroy', $order->id) }}"><i class="fas fa-trash-alt text-danger"></i></a></td>
					</tr>
				@endforeach

			</tbody>
		</table>
		<div class="mx-auto">
			{!! $orders->links() !!}
		</div>
	</div>
</div>

@stop