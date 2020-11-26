<link rel="stylesheet" href="{{ url('css/nav-bar.css') }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<style> 
#panelsucces {
  padding: 10px;
  display: none;
  text-align: center;
  background-color: #333333;
  color:#ffffff;
  font-size:20px;
}
#panelerror {
  padding: 10px;
  display: none;
  text-align: center;
  background-color: red;
  color:#ffffff;
  font-size:18px;
}
</style>
<div class='nav-container'>
  <nav class='nav-bar'>
  <div class='navbar-link'><a href="{{ url('/') }}" title="Inicio del sistema">Home</a></div>
  @guest
    <div class='navbar-link'><a href="{{ url('/terminos') }}" title="Registro del sistema">Unirse al banco</a></div>
    <div class='navbar-link'><a href="{{ url('/login') }}" title="Inciar sesión en el sistema">Iniciar sesión</a></div>
    @else
    @can('organizacion-list') 
    <div class='navbar-link'>
      <a href="{{ url('/solicitudes') }}" title="Agregar usuario en el sistema">Solicitudes</a>
    </div>
    @endcan
    <div class='navbar-link'><a href="{{ url('/estadoSolicitud') }}" title="Registro del sistema">Ir al menú</a></div>
    <div class='navbar-link'>
      <a 
        href="{{ url('/logout') }}" 
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();" title="Cerrar sesión en el sistema">Cerrar sesión
      </a>
    </div>
      <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
        {{csrf_field()}}
      </form>
    </div>
    @endguest
  </nav>
  <div id="panelsucces">{{ session('success') }}</div>
  <div id="panelerror">{{ session('error') }}</div>
</div>
<script>
@if(Session::has('success'))
    $("#panelsucces").show(1000).delay(3000);
    $("#panelsucces").hide(2000);
@endif;
@if(Session::has('error'))
    $("#panelerror").show(1000).delay(3000);
    $("#panelerror").hide(2000);
@endif;
</script>
 