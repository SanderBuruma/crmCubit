
@include('partials.head')
<body>
	<div id="app">
		@include('partials.nav')
		@include('partials.body')
	</div>

	@yield('scripts')
</body>
</html>
