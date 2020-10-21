<link rel="stylesheet" href="{{ url('css/nav-bar.css') }}">

<div class='nav-container'>
  <nav class='nav-bar'>
  <div class='navbar-link'><a href="{{ url('/') }}">Home</a></div>
  @guest
    <div class='navbar-link'><a href="{{ url('/') }}">Registrarse</a></div>
    <div class='navbar-link'><a href="{{ url('/login') }}">Iniciar Sesión</a></div>
    @else
    <div class='navbar-link'>
      <a href="{{ url('/addUser') }}">Agregar usuario</a>
      </div>
      <div class='navbar-link'>
        <a 
          href="{{ url('/logout') }}" 
          onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">Logout
        </a>
      </div>
      <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
        {{csrf_field()}}
      </form>
    </div>
    @endguest
  </nav>
</div>
 