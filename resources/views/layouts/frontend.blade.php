<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="{{ asset('/img/logo.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BOVIS VET - Przychodnia weterynaryjna</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Font awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">

    <!-- Google font style -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Anton&display=swap&subset=latin-ext" rel="stylesheet">

    <!-- Bootstrap CSS Core -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Animations Core CSS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- Slick -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/index.min.css') }}">
</head>

<body>
    <!-- Header -->
    <div class="container-fluid container-border">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light" id="menu" data-aos="fade-down" data-aos-duration="1000">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="/img/logo.png" width="80px" alt="logo">
                </a>
                <button class="navbar-toggler hamburger-button" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarHeader">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}#services">Usługi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}#news">Aktualności</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}#team">Zespół</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}#contact">Kontakt</a>
                        </li>
                        @auth
                        @if(Auth::user()->hasRole(['admin']))
                        <li class="nav-item"><a class="nav-link font-weight-bold" id="nav" href="{{ route('adminHome')}}">Admin</a></li>
                        @elseif(Auth::user()->hasRole(['employee']))
                        <li class="nav-item"><a class="nav-link font-weight-bold" href="{{ route('adminHome')}}">Pracownik</a></li>
                        @elseif(Auth::user()->hasRole(['customer']))
                        <li class="nav-item"><a class="nav-link font-weight-bold" href="{{ route('adminHome')}}">Klient</a></li>
                        @endif
                        <li class="nav-item"><a class="nav-link disable">Zalogowany jako: <span class="font-weight-bold">{{ Auth::user()->name }}</span></a></li>
                        @endauth
                    </ul>
                    <ul class="navbar-nav">
                        @guest
                        {{-- <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Zaloguj się</a></li> --}}
                        @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Wyloguj
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                    @endguest
                    </ul>
                </div>
            </nav>
            <div class="navbar-adress col-xl-5">
                <div class="navbar-adress-marker">
                    <span><i class="fas fa-globe-europe"></i> Grabów nad Prosną ul. Grodzka 7</span>
                </div>
                <div class="navbar-adress-phone">
                    <a href="tel:652-652-685"><i class="fas fa-phone"></i> 652-652-685</a>
                </div>
            </div>
        </div>
    </div>

    @yield('content')

    <!-- Footer -->
    <footer>
        <div class="container-fluid bgc" id="contact">
            <div class="container">
                <div class="row">
                    <nav class="navbar navbar-expand-lg navbar-light footer-menu">
                        <a class="navbar-brand" href="{{ route('home') }}">
                            <img src="/img/logo.png" width="80px" alt="logo">
                        </a>
                        <div class="collapse navbar-collapse" id="navbarHeader">
                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('home') }}#services">Usługi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('home') }}#news">Aktualności</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('home') }}#team">Zespół</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('home') }}#contact">Kontakt</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-lg contact">
                        <div class="row footer-contact ">
                            <div class="col-12 col-sm-12 col-md-6">
                                <i class="fas fa-phone"></i><span><a href="tel:784-502-605">784-502-605</a></span>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6">
                                <i class="fas fa-phone"></i><span><a href="tel:784-502-605">784-502-605</a></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-sm-12 col-md-4 col-xl-4 adress">
                        <div class="row footer-adress ">
                            <p>pon. - sob. 7:00 - 22:00</p>
                            <p>niedziele i święta - tylko kontakt telefoniczny</p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-8 col-xl-8 newsletter">
                        <span class="newsletter-input">Newsletter</span>
                        <input type="text" placeholder=" Wpisz adres e-mail" class="newsletter-input">
                        <button class="newsletter-button">Zapisz</button>
                    </div>
                </div>
                <div class="row">
                    <div class="footer-socialmedia">
                        <div class="footer-socialmedia-icons">
                            <a href="https://www.facebook.com/"><i class="fab fa-facebook-square"></i></a>
                            <a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
                            <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
                            <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                        </div>
                        <div class="footer-socialmedia-privileges">
                            <a class="footer-socialmedia-privileges-link" href="{{ route('privacy_policy') }}">Polityka prywatności</a>
                        </div>
                        <div class="footer-socialmedia-copyright">
                            <p> Copyright &copy Tomasz Walkowiak {{date("Y")}} </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Back to top button -->
        <a id="back-to-top" href="#" class="btn btn-success btn-lg back-to-top" role="button" data-toggle="tooltip" data-placement="right"><i class="fas fa-arrow-up"></i></a>
    </footer>

    <!-- JQuery JS Core -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

    <!-- Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.0.4/popper.js"></script>

    <!-- Bootstrap JS Core -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <!-- Animate Core JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Slick -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <!-- Custom JS Scripts -->
    <script src="{{ asset('js/scripts.js') }}" defer></script>
</body>

</html>
