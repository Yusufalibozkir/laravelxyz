<!DOCTYPE html>
<html lang="tr">
    <head>
        <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
        <title>@yield('title')</title>
    </head>
        <body>
            <header>
                <h1>@yield('headerTitle')</h1>
                <span class="user">
                @if(!Auth::check())
                {{HTML::link(URL::to('/login'), 'Giriş Yap')}} veya {{HTML::link(URL::to('/signup'), 'Üye Ol')}}
                @else
                Hoş geldin {{{Auth::user()->username}}}, {{HTML::link(URL::to('/logout'), 'Çıkış Yap')}}
                @endif
                </span>
            </header>
        @yield('body')
        <footer>Laravel 4 Kullanarak Kodlanmıştır.. Laravel.xyz v0.1</footer>
    </body>
</html>