<!DOCTYPE html>
<html>
<head>
	<title>ProJobs</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{asset('fontawesome/css/all.css')}}">
	<link rel="stylesheet" href="{{asset('fontawesome/css/fontawesome.css')}}">
	<link rel="icon" type="image/ico" href="Images/95.jpg" />
	<link rel="stylesheet" type="text/css" href="{{asset('css/header.css')}}">
	@stack('css')
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-info">
		<div class="container">
			<a class="navbar-brand" href="/">ProJobs.com</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon" ></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item dropdown ">
					<select class="mdb-select md-form colorful-select dropdown-primary">
						<option value="" disabled>Choose Country</option>
						<option value="1" selected>Myanmar</option>
						<option value="2">Singapore</option>
						<option value="3">Malaysia</option>
						<option value="3">Indonesia</option>
						<option value="3">Philipinnes</option>
						<option value="3">Vietnum</option>
					</select>
				</li>
			</ul>	
			<nav class="nav nav-pills flex-column flex-sm-row">
				
				@guest
				<li class="nav-item">
					<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
				</li>
				@if (Route::has('register'))
					<li class="nav-item">
						<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
					</li>
				@endif
			@else
				<li class="nav-item dropdown">
					<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
						{{ Auth::user()->name }} <span class="caret"></span>
					</a>

					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="{{ route('logout') }}"
							onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">
							{{ __('Logout') }}
						</a>

						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
					</div>
				</li>
			@endguest
				
				<a class="flex-sm-fill text-sm-center nav-link active" href="#">Employer</a>
			</nav>
		</div>
		</div>
	</nav>

