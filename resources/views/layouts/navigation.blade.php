<nav class="navbar navbar-expand-lg navbar-dark bg-black border-bottom border-secondary">
    <!-- Contenedor Principal -->
    <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <img src="{{ asset('/storage/images/LogoBind.svg') }}" alt="Logo de la aplicación" class="d-inline-block align-text-top" style="max-width: 300px; height: 46px;">
        </a>

        <!-- Botón para Menú Colapsable (en pantallas pequeñas) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Contenido del Menú -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="d-flex align-items-center w-100 justify-content-between">
                <!-- Campo de Búsqueda -->
                <form action="#" method="GET" class="d-flex ms-3">
                    <input
                        type="text"
                        name="query"
                        placeholder="Buscar..."
                        class="form-control rounded-start"
                        style="min-width: 250px;"
                    >
                    <button
                        type="submit"
                        class="btn btn-success rounded-end"
                    >
                        Buscar
                    </button>
                </form>

                <!-- Menú de Enlaces -->
                <ul class="navbar-nav d-flex align-items-center justify-content-end flex-grow-1 mx-auto me-5">
                    <li class="nav-item me-3">
                        <a class="nav-link text-white" href="{{ route('feed') }}">Inicio</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link text-white" href="#">Búsquedas</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link text-white" href="#">Notificaciones</a>
                    </li>
                    <li class="nav-item me-3">
                        <a class="nav-link text-white" href="#">Mensajes</a>
                    </li>
                </ul>

                <!-- Enlace de Perfil -->
                <ul class="navbar-nav ms-auto d-flex align-items-center">
                    @if (Auth::check())
                        <li class="nav-item dropdown">
                            <a
                                class="nav-link dropdown-toggle text-white"
                                href="#"
                                id="navbarDropdown"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                            >
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">{{ __('Profile') }}</a></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">{{ __('Log Out') }}</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('login') }}">{{ __('Log In') }}</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</nav>