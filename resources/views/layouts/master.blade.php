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
		<nav class="navbar navbar-inverse">
      		<div class="container-fluid">
        		<div class="navbar-header">
          			<a class="navbar-brand" href="/">FancyPaper</a>
        		</div>
        		<ul class="nav navbar-nav">
                    <li><a href="/posters/breakeven">Breakeven</a></li>
                    <li><a href="/posters/index">Posters</a></li>
                    <li><a href='/posters/create'>Add a Poster</a>
					<li><a href='/posters/sold'>Sales</a>
        		</ul>
      		</div>
    	</nav>
  	</header>

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