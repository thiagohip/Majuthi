<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-secondary border-bottom border-primary">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ route('home')}}">MAJUTHI</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          @guest
          <div class="d-flex" id="navbarNav">
            <ul class="navbar-nav gap-2">
              <li class="nav-item">
                <a class="btn btn-outline-primary" aria-current="page" href="{{ route('login')}}">Login</a>
              </li>
              <li class="nav-item">
                <a class="btn btn-outline-primary" href="{{ route('register')}}">Cadastre-se</a>
              </li>
            </ul>
          </div>
          @endguest

          @auth
          <div class="d-flex" id="navbarNav">
            <ul class="navbar-nav gap-2">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="{{route('profile.edit')}}">Perfil</a></li>
                  <li><a class="dropdown-item" href="{{route('types.index')}}">Tipos</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown-link :href="route('logout')" class="dropdown-item"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form></li>
                </ul>
              </li>
            </ul>
          </div>
          @endauth

        </div>
      </nav>

    @yield('content')
</body>
</html>