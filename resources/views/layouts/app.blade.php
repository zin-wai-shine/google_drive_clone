<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/sass/app.scss' , 'resources/js/app.js'])
</head>
<body>
    <div id="app" class="position-relative">

                @guest
                    <div class="p-2 bg-white shadow-sm d-flex align-items-center px-3">
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center align-items-center gap-5">
                                <div class="d-flex align-items-center gap-2">
                                    <img class="gb_zc gb_6d" src="//ssl.gstatic.com/images/branding/product/1x/drive_2020q4_48dp.png" srcset="//ssl.gstatic.com/images/branding/product/2x/drive_2020q4_48dp.png 2x ,//ssl.gstatic.com/images/branding/product/1x/drive_2020q4_48dp.png 1x" alt="" aria-hidden="true" role="presentation" style="width:40px;height:40px">
                                    <h4 class="mb-0">Drive</h4>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center gap-5">
                            @if (Route::has('login'))
                                <div class="nav-item">
                                    <a class="nav-link fw-bold h4 text-decoration-none" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </div>
                            @endif
                            @if (Route::has('register'))
                                <div class="nav-item">
                                    <a class="nav-link fw-bold h4 text-decoration-none" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="h-100 w-100">
                        <div class="mtStatus">
                            @yield('content')
                        </div>
                    </div>
                @else
                        @include('layouts.nav')
                        <div class="d-flex justify-content-between">
                            @include('layouts.sidebar')
                            <div class="w-100 px-3 py-5  content__container">
                                @yield('content')
                            </div>
                        </div>

            @endguest
    </div>



<script>
        @if(session('status'))
            toast();
        @endif
</script>
    @stack('script')

</body>
</html>
