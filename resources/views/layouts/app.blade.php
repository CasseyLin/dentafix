<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"defer></script>

    <!-- Datepicker -->
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Datepicker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'DentaFix') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        @if(auth()->check()&& auth()->user()->role->name === 'patient')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('my.appointment') }}" >{{ __('My Appointment') }}</a>
                            </li>
                        @endif

                        @if(auth()->check()&& auth()->user()->role->name === 'patient')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('my.prescription') }}" >{{ __('My Prescriptions') }}</a>
                        </li>
                        @endif
                        

                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ 
                                    route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ 
                                    route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @if(auth()->check()&& auth()->user()->role->name === 'patient')
                                    <a href="{{__('userProfile') }}" class="dropdown-item">Profile</a>
                                    @else
                                    <a href="{{__('dashboard') }}" class="dropdown-item">Dashboard</a>
                                    @endif
                                    
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{__('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

<script>
    var dateToday = new Date();
    $(function(){
        $("#datepicker").datepicker({
            format:"yy-mm-dd",
            showButtonPanel:true,
            numberOfMonths:2,
            minDate:dateToday,
        });
    });
</script>
<style type="text/css">
    label.btn input{
        opacity: 0;
        position: absolute;
    }
    label.btn span{
        text-align: center;
        padding: 8px 15px;
        display:block;
        min-width: 90px;
    }
    label.btn input:checked+span{
        background-colour: rgb(80,110,228);
        color:whitesmoke;
    }

</style>
</body>
</html>
