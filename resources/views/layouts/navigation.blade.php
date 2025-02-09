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
                <form action="#" method="GET" class="d-flex ms-3 position-relative" style="width: 250px;">
                    <!-- Contenedor del Input -->
                    <div class="position-relative w-100">
                        <!-- Ícono de lupa dentro del input -->
                        <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-2 text-muted"></i>
                        <!-- Input redondeado -->
                        <input
                            type="text"
                            name="query"
                            placeholder=" Buscar..."
                            class="form-control rounded-pill ps-4"
                            style="min-width: 250px;"
                            onkeydown="if(event.key === 'Enter') { this.form.submit(); }"
                        >
                    </div>
                </form>

                                <!-- Menú de Enlaces -->
                <ul class="navbar-nav d-flex align-items-center justify-content-end flex-grow-1 mx-auto" style="margin-right: 15rem!important;">
                    <li class="nav-item me-3 text-center">
                        <a class="nav-link {{ request()->routeIs('feed') ? 'active' : '' }} nav-link  d-flex flex-column align-items-center" href="{{ route('feed') }}">
                            <!-- Icono SVG -->
                            <img src="{{ asset('/storage/images/homex.svg') }}" alt="Inicio" style="width: 24px; height: 24px;" class="icon">
                            <!-- Texto -->
                            <span class="mt-2">Inicio</span>
                        </a>
                    </li>
                    <li class="nav-item me-3 text-center">
                        <a class="nav-link {{ request()->routeIs('searches') ? 'active' : '' }} nav-link text-white d-flex flex-column align-items-center" href="{{ route('searches') }}">
                            <!-- Icono SVG -->
                            <img src="{{ asset('/storage/images/megaphone.svg') }}" alt="Búsquedas" style="width: 24px; height: 24px;" class="icon">
                            <!-- Texto -->
                            <span class="mt-2">Búsquedas</span>
                        </a>
                    </li>
                    <li class="nav-item me-3 text-center">
                        <a class="nav-link {{ request()->routeIs('notifications') ? 'active' : '' }} nav-link text-white d-flex flex-column align-items-center" href="{{ route('notifications') }}">
                            <!-- Icono SVG -->
                            <img src="{{ asset('/storage/images/bell.svg') }}" alt="Notificaciones" style="width: 24px; height: 24px;" class="icon">
                            <!-- Texto -->
                            <span class="mt-2">Notificaciones</span>
                        </a>
                    </li>
                    <li class="nav-item me-3 text-center">
                        <a class="nav-link {{ request()->routeIs('messages') ? 'active' : '' }} nav-link text-white d-flex flex-column align-items-center" href="{{ route('messages') }}">
                            <!-- Icono SVG -->
                            <img src="{{ asset('/storage/images/chat.svg') }}" alt="Mensajes" style="width: 24px; height: 24px;" class="icon">
                            <!-- Texto -->
                            <span class="mt-2">Mensajes</span>
                        </a>
                    </li>
                </ul>

                <!-- Enlace de Perfil -->
                <ul class="navbar-nav ms-auto d-flex align-items-center" style="margin-right: 5rem;">
                    @if (Auth::check())
                        <li class="nav-item dropdown text-center position-relative">
                            <!-- Contenedor del ícono y el texto -->
                            <div
                                id="profileDropdownToggle"
                                class="nav-link text-white d-flex flex-column align-items-center cursor-pointer"
                            >
                                <!-- Imagen de perfil -->
                                <img
                                    src="{{ asset('/storage/images/perfil.png') }}"
                                    alt="Foto de perfil"
                                    class="rounded-circle"
                                    style="width: 35px; height: 35px;"
                                >
                                <!-- Texto "Mi perfil" -->
                                Mi perfil
                            </div>
                            <!-- Menú desplegable -->
                            <ul id="profileDropdownMenu" class="dropdown-menu dropdown-menu-dark position-absolute" style="display: none;" aria-labelledby="navbarDropdown">
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