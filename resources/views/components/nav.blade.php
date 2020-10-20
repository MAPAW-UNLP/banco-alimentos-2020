<link rel="stylesheet" href="{{ url('css/nav-bar.css') }}">

<div class='nav-container'>
  <nav class='nav-bar'>
  @guest
    <div class='navbar-link'><a href="{{ url('/') }}">Home</a></div>
    <div class='navbar-link'><a href="{{ url('/') }}">Registrarse</a></div>
    <div class='navbar-link'><a href="{{ url('/login') }}">Iniciar Sesión</a></div>
    @else
    <div class='navbar-link'><a href="{{ url('/logout') }}">Cerrar Sesión</a></div>
    @endguest
  </nav>
</div>
 