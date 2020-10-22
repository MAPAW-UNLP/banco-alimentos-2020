<link rel="stylesheet" href="{{ url('css/nav-bar.css') }}">

<div class='nav-container'>
  <nav class='nav-bar'>
  <div class='navbar-link'><a href="{{ url('/') }}" title="Inicio del sistema">Home</a></div>
  @guest
    <div class='navbar-link'><a href="{{ url('/') }}" title="Registro del sistema">Registrarse</a></div>
    <div class='navbar-link'><a href="{{ url('/login') }}" title="Inciar sesión en el sistema">Iniciar sesión</a></div>
    @else
    <div class='navbar-link'>
      <a href="{{ url('/addUser') }}" title="Agregar usuario en el sistema">Agregar usuario</a>
      </div>
      <div class='navbar-link'>
        <a 
          href="{{ url('/logout') }}" 
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();" title="Cerrar sesión en el sistema">Logout
        </a>
      </div>
      <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
        {{csrf_field()}}
      </form>
    </div>
    @endguest
  </nav>
</div>
 