
@include('partials.head')
<body>
	<div id="app">
		@include('partials.nav')
		@if (count($errors)>0)
		
			<div class="alert alert-danger" role="alert">
				<strong>Errors:</strong>
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		
		@endif

		<main class="py-4">
				@yield('content')
		</main>
	</div>

	@yield('scripts')
</body>
</html>
