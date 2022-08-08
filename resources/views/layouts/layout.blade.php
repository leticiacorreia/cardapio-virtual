<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Meu Cardápio') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
</head>

<body>
  <div class="d-flex flex-column">
    <div class="bg-primary">
      <nav class="navbar navbar-expand-lg container navbar-dark ">
        <div class="container-fluid">
          <a href="#" class="d-flex align-items-center gap-1 text-light text-decoration-none">
            <i class="bi bi-journal-bookmark"></i>
            <strong class="fs-4">Meu Cardápio</strong>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse d-flex gap-2 justify-content-end" id="navbarNavAltMarkup">
            @guest
                @if (Route::has('login'))
                    <a class="text-light text-decoration-none" href="{{ route('login') }}">{{ __('Login') }}</a>
                @endif

                @if (Route::has('register'))
                    <a class="text-light text-decoration-none" href="{{ route('register') }}">{{ __('Cadastro') }}</a>
                @endif
            @else
                <div class="navbar-nav px-4">
                  <a class="nav-link" aria-current="page" href="{{route('menu.index')}}">Cardápios</a>
                  <a class="nav-link active" href="{{route('product.index')}}">Produtos</a>
                  <a class="nav-link" href="{{route('order.index')}}">Ver Pedidos</a>
                  <a class="nav-link" href="{{route('user.index')}}">Funcionários</a>
                  <a class="nav-link" href="{{route('establishment.show', \Auth::user()->establishment_id)}}">Dados da Empresa</a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                      @csrf
                      <button class="btn btn-link text-light text-decoration-none g-4" type="submit" name="button">  <strong class="text-light">Sair</strong> <i class="bi bi-box-arrow-left"></i></button>
                  </form>
                </div>
            @endguest
          </div>
        </div>
      </nav>
    </div>
    <main class="container pt-4">
        @yield('content')
    </main>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>
