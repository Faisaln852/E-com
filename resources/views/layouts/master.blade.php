<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('dependencies/css/fontawesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('dependencies/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- owl carousel -->
    <link href="{{ asset('dependencies/css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{ asset('dependencies/css/owl.theme.default.min.css')}}" rel="stylesheet">
    <!-- custom css -->
    <link href="{{ asset('dependencies/css/admin_custom.css')}}" rel="stylesheet">
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- font awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    @include('layouts.inc.navbar')
    <div class="container">

        <div class="row my-5 py-2 ">
            <div class="col-md-3 mb-5">
                @include('layouts.inc.sidebar')
            </div>

            <div class="col-md-9">
                @yield('content')

            </div>


        </div>

    </div>

    <!-- Scripts -->
    <script src="{{ asset('dependencies/js/jquery.min.js') }}"></script>
    <script src="{{ asset('dependencies/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('dependencies/js/popper.min.js') }}" defer></script>
    <script src="{{ asset('dependencies/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('dependencies/js/perfect-scrollbar.min.js') }}" defer></script>
    <script src="{{ asset('dependencies/js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('dependencies/js/admin_custom.js') }}"></script>
    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        sweetalter min.js file is not working check later-->
    <script src="{{ asset('dependencies/js/admin_custom.js') }}" defer></script>

    @if(session('status'))
    <script>
        swal("{{session('status')}}");
    </script>
    @endif
    @yield('scripts')
</body>

</html>