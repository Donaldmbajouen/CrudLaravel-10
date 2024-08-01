<!DOCTYPE html>
<html lang="Fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Crud avec Laravel</title>
        <link href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/assets/fontawesome/css/all.css') }}" rel="stylesheet">
    </head>
    <body>
        @auth

            {{"Utilisateur:  "}}{{ \Illuminate\Support\Facades\Auth::user()->name }}
            <form action="{{ 'logout' }}" method="POST">
                @method('delete')
                @csrf
                <button class="nav-item"> Se Deconnecter</button>
            </form>
        @endauth
        @guest
            <a href="{{  route('login')}}"> se connecter  </a>
        @endguest
        @yield('content');
    </body>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
</html>

