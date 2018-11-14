@extends('pages/home')

@section('title', "| Show $product->name")

@section('content')

<div class="row">
	<div class="col-md-8 offset-md-2">
		<div class="card">
			<div class="card-header"><h1>{{ "$product->name" }}</h1></div>
			<table class="table table-borderless">
<?php

$totalRevenue = 0;
$totalSales = 0;
foreach($product->orders as $order){
	$totalRevenue += $order->products->price * $order->quantity;
	$totalSales += $order->quantity;
}

?>
				<thead>
					<th>Price</th>
					<td>€{{ $order->products->price }},-</td>
				</thead>
				<thead>
					<th>Unit Sales</th>
					<td>{{ $totalSales }}</td>
				</thead>
				<thead>
					<th>Revenue</th>
					<td>€{{ $totalRevenue }},-</td>
				</thead>
			</table>
		</div>
	</div>
</div>
<br>
<div class="row"></div>
	<div class="col-md-8 offset-md-2">
		<div class="card">
			<div class="card-header"><h1>Orders</h1></div>
			<table class="table table-hover">
				<thead>
					<th>ID</th>
					<th>Customer & ID</th>
					<th>Quantity</th>
					<th>Sum Total</th>
					<th>Created</th>
				</thead>
				<tbody>
					@foreach($product->orders as $order)
						<tr>
							<td>{{ $order->id }}</td>
							<td>{{ $order->customers->fname }} {{ $order->customers->lname }} - {{ $order->customers->id }}</td>
							<td>{{ $order->quantity }}</td>
							<td>€{{ $order->products->price * $order->quantity }},-</td>
							<td>{{date('M j, Y - G:i', strtotime( $order->created_at ))}}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<br>
	{!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'DELETE']) !!}
				
	{!! Form::submit('Delete Product', ['class'=>'btn btn-danger btn-block col-md-2 offset-md-5']) !!}
	
	{!! Form::close() !!}
</div>

@endsection