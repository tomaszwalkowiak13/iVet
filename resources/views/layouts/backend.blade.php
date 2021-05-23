<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="{{ asset('/img/logo.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>iVet | Twój gabinet weterynaryjny</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css" integrity="sha384-i1LQnF23gykqWXg6jxC2ZbCbUMxyw5gLZY6UiUS98LYV5unm8GWmfkIS6jqJfb4E" crossorigin="anonymous">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{('/css/dataTables.css')}}">
    <!-- Styles -->
    <link rel="stylesheet" href="{{('/css/admin.css')}}">

</head>

<body id="page-top">
    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
        <a class="navbar-brand mr-1" href="{{ route('home') }}">iVet</a>
        <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
            <i class="fas fa-bars"></i>
        </button>
        <!-- Navbar -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item text-white my-auto mx-5">Zalogowany jako: <span class="font-weight-bold">{{ Auth::user()->name }}</span>
            </li>
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <i class="fas fa-user-circle"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('profile') }}">Profil</a>
                    <a class="dropdown-item" href="{{ route('person', ['id' => Auth::user()->id])}}">Moja aktywność</a>
                    <a class="dropdown-item" href="{{ route('ShowChangePasswordForm') }}">Zmień hasło</a>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Wyloguj') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </nav>
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="sidebar navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('adminHome') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Panel główny</span>
                </a>
            </li>
            @if(Auth::user()->hasRole(['admin', 'employee']))
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdownCustomer" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-friends"></i>
                    <span>Klienci</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdownCustomer">
                    <a class="dropdown-item" href="{{ route('customer') }}">Lista klientów</a>
                    <a class="dropdown-item" href="{{ route('saveCustomer') }}">Dodaj klienta</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdownExam" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-syringe"></i>
                    <span>Leczenie</span>
                </a>
                <div class="dropdown-menu " aria-labelledby="pagesDropdownExam">
                    <h6 class="dropdown-header">Badania:</h6>
                    <a class="dropdown-item" href="{{ route('examination') }}">Lista badań</a>
                    <div class="dropdown-divider"></div>
                    <h6 class="dropdown-header">Recepty:</h6>
                    <a class="dropdown-item" href="{{ route('prescription') }}">Lista recept</a>
                </div>
            </li>
            @endif
            @if(Auth::user()->hasRole(['admin']))
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdownEmployee" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-people-carry"></i>
                    <span>Pracownicy</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdownEmployee">
                    <a class="dropdown-item" href="{{ route('employee') }}">Lista pracowników</a>
                    <a class="dropdown-item" href="{{ route('saveEmployee') }}">Dodaj pracownika</a>
                </div>
            </li>
            @endif
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdownAnimal" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-dog"></i>
                    @if(Auth::user()->hasRole(['admin','employee']))
                    <span>Zwierzęta</span>
                    @else
                    <span>Moje zwierzęta</span>
                    @endif
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdownAnimal">
                    <h6 class="dropdown-header">Zwierzęta:</h6>
                    @if(Auth::user()->hasRole(['admin','employee']))
                    <a class="dropdown-item" href="{{ route('animal') }}">Lista zwierząt</a>
                    @else
                    <a class="dropdown-item" href="{{ route('animal') }}">Lista moich zwierząt</a>
                    @endif
                    <div class="dropdown-divider"></div>
                    <h6 class="dropdown-header">Stada:</h6>
                    @if(Auth::user()->hasRole(['admin','employee']))
                    <a class="dropdown-item" href="{{ route('herd') }}">Lista stad</a>
                    @else
                    <a class="dropdown-item" href="{{ route('herd') }}">Lista moich stad</a>
                    @endif
                </div>
            </li>
            @if(Auth::user()->hasRole(['admin']))
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdownService" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-hands-helping"></i>
                    <span>Usługi</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdownService">
                    <a class="dropdown-item" href="{{ route('service') }}">Lista usług</a>
                    <a class="dropdown-item" href="{{ route('saveService') }}">Dodaj usługę</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="pagesDropdownArticle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ad"></i>
                    <span>Artykuły</span>
                </a>
                <div class="dropdown-menu" aria-labelledby="pagesDropdownArticle">
                    <h6 class="dropdown-header">Artykuły:</h6>
                    <a class="dropdown-item" href="{{ route('articleAdmin') }}">Lista artykułów</a>
                    <a class="dropdown-item" href="{{ route('saveArticle') }}">Dodaj artykuł</a>
                    <h6 class="dropdown-header">Komentarze:</h6>
                    <a class="dropdown-item" href="{{ route('comment') }}">Lista komentarzy</a>
            </li>
            @endif
        </ul>
        @if ($errors->any())
        <div class="container-fluid">
            <div class=" alert alert-danger mt-3">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @yield('content')
        </div>
    </div>
    <!-- Sticky Footer -->
    <footer class="sticky-footer">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright © iVet {{date("Y")}}</span>
            </div>
        </div>
    </footer>

    <!-- JQuery JS Core -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous">
    </script>
    <!-- Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.0.4/popper.js"></script>
    <!-- Bootstrap JS Core -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <!-- Scripts -->
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{asset('/js/admin.js')}}"></script>
</body>

</html>
