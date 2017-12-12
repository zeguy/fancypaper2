<!DOCTYPE html>
<html lang="en">
<head>

	<title>Fancypaper</title>
  
	<meta charset="utf-8">
  
	<link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="/css/fancypaper2.css">

</head>
<body>

	<header>
		@php
			# Define a PHP array of links and their labels
			# Quite a bit of straight PHP code here, but arguably ok
			# because it's display specific and allows you to edit the link
			# labels without having to edit a logic file.
			if(Auth::check()) {
				$nav = [
					'posters/breakeven' => 'Breakeven',
					'posters/index' => 'Posters',
					'posters/create' => 'Add a poster',
					'posters/sold' => 'Sales',
				];
			} else {
				$nav = [
					'register' => 'Register',
					'login' => 'Login',
					'posters/breakeven' => 'Breakeven',
				];
			}
		@endphp

		<nav>
			<ul>
				@foreach($nav as $link => $label)
					<li><a href='/{{ $link }}' class='{{ Request::is($link) ? 'active' : '' }}'>{{ $label }}</a>
				@endforeach

				@if(Auth::check())
					<li>
						<form method='POST' id='logout' action='/logout'>
							{{csrf_field()}}
							<a href='#' onClick='document.getElementById("logout").submit();'>Logout {{ $user->name }}</a>
						</form>
					</li>
				@endif
			</ul>
		</nav>
  	</header>
	
	<section>
    	@yield('subNav')
	</section>

	<section>
    	@yield('content')
	</section>

	<footer class="container-fluid text-center">
  		<div class="footer-copyright">
        	<div class="container-fluid">
            	© 2017 Copyright: <a href="https://p1.zeguy.me"> ZeGuy </a>
        	</div>
    	</div>
	</footer>

</body> 
</html>