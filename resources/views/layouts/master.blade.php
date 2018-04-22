<!DOCTYPE html>
<html lang="en">
<head>

    <title>Fancypaper</title>
  
    <meta charset="utf-8">
  
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/css/fancypaper2.css">

    @stack('head')

</head>
<body>

    <header>
        @php
            # Define a PHP array of links and their labels
            # Quite a bit of straight PHP code here, but arguably ok
            # because it's display specific and allows you to edit the link
            # labels without having to edit a logic file.
            if(Auth::check()) {
                if(Auth::user()->role=="admin") {
                    $nav = [
                        'posters/breakeven' => 'Breakeven',
                        'posters/index' => 'Prints',
                        'posters/create' => 'Add Print',
                        'posters/sold' => 'Sales',
                    ];
                } else {
                    $nav = [
                        #'posters/breakeven' => 'Breakeven',
                        'posters/index' => 'Prints',
                        #'posters/create' => 'Add Print',
                        'posters/sold' => 'Sales',
                    ];
                }
            } else {
                $nav = [
                    'register' => 'Register',
                    'login' => 'Login',
                    #'posters/breakeven' => 'Breakeven',
                ];
            }
        @endphp

        <nav class="navbar navbar-inverse">
                 <ul class="nav navbar-nav navbar-right">
                        <div class="container-fluid">
                            @if(Auth::check())
                                <li>
                                    <form method='POST' id='logout' action='/logout'>
                                        {{csrf_field()}}
                                        <a href='#' onClick='document.getElementById("logout").submit();'>logout ({{$user->name}})</a>
                                    </form>
                                </li>
                            @endif
                        </div>
                    </ul>

                <div class="navbar-header">

                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                        </button>

                    <a class="navbar-brand" href="/"><img class="img-responsive" alt='Ze Gallerie' src="/img/home.png"></a>
                </div>

                <div class="collapse navbar-collapse" id="myNavbar">
                            <ul class="nav navbar-nav">
                                @foreach($nav as $link => $label)
                                    <li><a href='/{{ $link }}' class='{{ Request::is($link) ? 'active' : '' }}'>{{ $label }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                </div>
        </nav>
      </header>

    <section>
        @yield('content')
    </section>

    <footer class="container-fluid text-center">
          <div class="footer-copyright">
            <div class="container-fluid">
                © 2018
            </div>
        </div>
    </footer>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body> 
</html>