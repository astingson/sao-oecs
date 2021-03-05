<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewpoint" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X=UA-Compatible" content="ie=edge">
        <title>SAO OECS</title>

        <script type="module" src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
        <script nomodule src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine-ie11.min.js" defer></script>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}" class="">
        <link rel="stylesheet" href="{{ asset('css/register.css') }}" class="">
    </head>
        <body class="bg-indigo-200">
        <nav class="p-6 bg-white flex justify-between mb-6">
            <ul class="flex items-center">
            @auth
                <li>
                    <a href="{{ route('forms.index') }}" class="p-3"><b>SAO-OECS</b></a>
                </li>
            @endauth

            @guest
                <li>
                    <a href="/" class="p-3"><b>SAO-OECS</b></a>
                </li>
            @endguest
            </ul>

            <ul class="flex items-center">
                @auth
                <li>
                    <a href="" class="p-3">{{ Auth::user()->name }}</a> 
                </li>

                @if ((Auth::User()->role == 2))
                <li>
                    <a href="{{ route('report') }}" class="p-3">Report</a>
                </li>
                @endif

                <li>
                    <form action="{{ route('logout') }}" method="post" class="p-3 inline">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
                @endauth
            </ul>
        </nav>

    
        @yield('content')
    </body>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/register.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/forms.js') }}"></script>
</html>