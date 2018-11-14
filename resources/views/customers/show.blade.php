@extends('pages/home')

@section('title', "| Show $customer->fname $customer->lname")

@section('content')

<div class="row">
	<div class="col-md-8 offset-md-2">
		<div class="card">
			<div class="card-header"><h1>{{ "$customer->fname $customer->lname" }}</h1></div>
			<table class="table table-borderless">
				<thead>
					<th>Address</th>
					<td>{{ $customer->address }}</td>
				</thead>
				<tbody>
					<tr>
						<td>City</td>
						<td>{{ $customer->city }}</td>
					</tr>
					<tr>
						<td>Phone1</td>
						<td>{{ $customer->phone1 }}</td>
					</tr>
					<tr>
						<td>Phone2</td>
						<td>{{ $customer->phone2 }}</td>
					</tr>
					<tr>
						<td>E-Mail</td>
						<td>{{ $customer->email }}</td>
					</tr>
					<tr>
						<td>Balance</td>
						<td>€{{ $customer->balance }},-</td>
					</tr>
					<tr>
<?php 
//prepare $totalExpenses
$totalExpenses = 0;
foreach($customer->orders as $order){
	$totalExpenses += $order->products->price * $order->quantity;
}

?>
						<td>TotalExpenses</td>
						<td>€{{ $totalExpenses }},-</td>
					</tr>
					<tr>
						<td>Credit</td>
						<td>€{{ $customer->balance-$totalExpenses }},-</td>
					</tr>
					<tr>
						<td>Created</td>
						<td>{{ date('F nS, Y - G:i', strtotime( $customer->created_at )) }}</td>
					</tr>
				</tbody>
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
					<th>Product & ID</th>
					<th>Quantity</th>
					<th>Sum Total</th>
					<th>Created</th>
				</thead>
				<tbody>
					@foreach($customer->orders as $order)
						<tr>
							<td>{{ $order->id }}</td>
							<td>{{ $order->products->name }} - {{ $order->products->id }}</td>
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
	{!! Form::open(['route' => ['customers.destroy', $customer->id], 'method' => 'DELETE']) !!}
				
	{!! Form::submit('Delete Customer', ['class'=>'btn btn-danger btn-block col-md-2 offset-md-5']) !!}
	
	{!! Form::close() !!}
</div>

@endsection