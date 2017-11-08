<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="description"
	      content="Fotogaravel is a simple, fast and light app to create a gallery of your photos using a Laravel framework.">
	<title>Fotogaravel</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/css/foundation.min.css">
</head>
<body>

@include('inc.navigation')

<div class="row">
	@include('common.messages')
	@yield('content')
</div>

</body>
</html>
