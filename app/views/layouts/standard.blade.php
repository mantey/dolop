<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>{{ $title or 'Desenvolvendo com Laravel' }}</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	@include('templates.menu')

	<div class="container">
		@yield('content')
	</div>

	<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
	<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<!-- Placed at the end of the document so the pages load faster -->
{{ HTML::script("assets/js/test1.js") }}
<script src="{{ URL::to('/') }}/assets/js/test2.js"></script>
<script src="{{ Request::root() }}/assets/js/test3.js"></script>

	@section('custom_script')
    @show
</body>
</html>