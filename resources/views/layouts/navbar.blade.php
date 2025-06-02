<nav class="navbar navbar-expand-lg" style="background-color: #f7b6d2;">
  <style>
    .btn-carrito,
    .dropdown-toggle,
    .btn-iniciar-sesion {
      background-color: #ec5ca8;
      border: none;
      color: white !important;
      padding: 6px 12px;
      border-radius: 5px;
    }

    .btn-carrito:hover,
    .dropdown-toggle:hover,
    .btn-iniciar-sesion:hover {
      background-color: #d94e96;
      color: white !important;
    }

    .btn-cerrar-sesion {
      background-color: #ec5ca8;
      color: white;
      border: none;
      border-radius: 5px;
      padding: 6px 12px;
    }

    .btn-cerrar-sesion:hover {
      background-color: #d94e96;
      color: white;
    }
  </style>

  <div class="container">
    <a class="navbar-brand" href="{{ route('home') }}">
      <img src="{{ asset('img/logo.png') }}" alt="Logo" style="height:40px;">
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
      aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarContent">
      <ul class="navbar-nav ms-auto align-items-center">

        @auth
        <!-- Notificaciones -->
        <li class="nav-item me-3">
          <a class="nav-link position-relative text-dark" href="#">
            <i class="bi bi-bell" style="font-size: 1.5rem;"></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
              3
              <span class="visually-hidden">notificaciones sin leer</span>
            </span>
          </a>
        </li>
        @endauth

        <!-- Carrito -->
        <li class="nav-item me-3">
          <a href="{{ route('carrito.index') }}" class="btn btn-carrito d-flex align-items-center">
            <i class="bi bi-cart me-2" style="font-size: 1.5rem;"></i>
            Carrito
          </a>
        </li>

        @auth
        <!-- Perfil -->
        <li class="nav-item dropdown me-3">
          <a class="nav-link dropdown-toggle" href="#" id="navbarPerfil" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Mi Perfil
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="#">Ver Perfil</a></li>
            <li><a class="dropdown-item" href="#">Editar Perfil</a></li>
          </ul>
        </li>

        <!-- Cerrar sesión -->
        <li class="nav-item">
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn-cerrar-sesion">
              Cerrar Sesión
            </button>
          </form>
        </li>
        @endauth

        @guest
        <!-- Iniciar sesión -->
        <li class="nav-item me-3">
          <a href="{{ route('login') }}" class="btn btn-iniciar-sesion">Iniciar Sesión</a>
        </li>
        @endguest

      </ul>
    </div>
  </div>
</nav>
