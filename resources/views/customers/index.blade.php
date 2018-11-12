@extends('pages/home')

@section('tite', '| Customers | Index')

@section('content')

<div class="row">
	<div class="col-md-9">
		<h1>All Customers</h1>
	</div>

	<div class="col-md-3">
		<a href="{{ route('customers.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">New Customer</a>
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
				<th>fName</th>
				<th>lName</th>
				<th>Address</th>
				<th>Phone 1</th>
				<th>Phone 2</th>
				<th>E-Mail</th>
				<th>Balance</th>
				<th>Created At</th>
				<th></th>
			</thead>

			<tbody>

				@foreach($customers as $customer)

					<tr>
						<th>{{$customer->id}}</th>
						<td>{{$customer->fname}}</td>
						<td>{{$customer->lname}}</td>
						<td>{{$customer->address}}</td>
						<td>{{$customer->phone1}}</td>
						<td>{{$customer->phone2}}</td>
						<td>{{$customer->email}}</td>
						<td>{{$customer->balance}}</td>
						<td>{{date('M j, Y', strtotime($post->created_at))}}</td>
						<td><a href="{{ route('posts.show', $post->id) }}" class="btn btn-secondary btn-sm">View</a><a href="{{ route('customers.edit', $post->id) }}" class="btn btn-secondary btn-sm btn-edit">Edit</a></td>
					</tr>

				@endforeach

			</tbody>
		</table>
		<div class="mx-auto">
			{!! $customers->links() !!}
		</div>
	</div>
</div>

@stop