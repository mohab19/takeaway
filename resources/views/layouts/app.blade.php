<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <script src="https://kit.fontawesome.com/4af7d13715.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/takeaway.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
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
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <a class="nav-link" id="pills-home-tab" href="{{url('/')}}" aria-selected="true">Home</a>
                            <a class="nav-link" id="pills-resturant-tab" href="{{url('/resturant')}}" aria-selected="false">Resturants</a>
                            <a class="nav-link" id="pills-user-tab" href="{{url('/user')}}" aria-selected="false">Users</a>
                            <a class="nav-link" id="pills-order-tab" href="{{url('/order')}}" aria-selected="false">Make Order</a>
                        </ul>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4"> 
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('js/takeaway.js') }}" defer></script>
</body>
</html>
