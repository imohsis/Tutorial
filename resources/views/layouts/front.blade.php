<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Forum</title>
	<link rel="stylesheet" href="https://bootswatch.com/3/paper/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/css/selectize.min.css">
	<link rel="stylesheet" href="{{asset('css/main.css')}}">

	<script>
		window.Laravel= {!! json_encode([

		  'csrfToken' => csrf_token()

		      ])

		 !!};



	</script>





</head>
<body>
<div id="app">

@include('layouts.partials.navbar')
@yield('banner')

<div class="container">
	@include('layouts.partials.error')
	@include('layouts.partials.success')
  {{--Category section--}}
   <div class="row">
	      @section('category')
	   @include('layouts.partials.categories')
	    @show


	   <div class="col-md-9">
		   <div class="row content-heading"><h4>@yield('heading')</h4></div>
		   <div class="content-wrap" >

			   @yield('content')
		   </div>
	   </div>


	</div>







</div><br><hr>

<div class="footer text-center">
	footer goes here
</div>

</div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"
integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
crossorigin="anonymous"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="{{asset('js/main.js')}}"></script>

<script src="{{asset('js/app.js')}}"></script>

@yield('js')

</body>
</html>