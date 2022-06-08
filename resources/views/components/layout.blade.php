<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> {{ $title}} - Controle de Séries</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
</head>
<body>
    <div class="container">

        <header>
            <nav class="navbar navbar-light bg-light">
                <div class="container-fluid">
                  <a class="navbar-brand" href="{{ route('series.index')}}">
                    Séries
                  </a>
                  <a href="{{ route('logout')}}" class="nav-item" style="color: red;">
                      Sair
                  </a>
                </div>
              </nav>

            <h1>{{ $title }}</h1>
        </header>

        @isset($mensagemSucesso)
            <div class="alert alert-success"> {{ $mensagemSucesso}} </div>  
        @endisset

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)  
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <main>
            {{ $slot }}
        </main>

        <footer>
        </footer>
    </div>
</body>
</html>