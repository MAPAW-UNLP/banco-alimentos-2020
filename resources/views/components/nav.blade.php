<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #FB4A1B;">
  <a class="navbar-brand" href="{{ url('/') }}">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown" aling="rigth">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item"> 
        <a class="nav-link" href="#" >Registrar organización</a>
      </li>
      <li class="nav-item"> 
        <a class="nav-link" href="{{ url('/login') }}" >Iniciar sesión</a>
      </li>
    </ul>
  </div>
</nav>


<style>
/* Este es para los elementos en general */
.navbar-light .navbar-nav .nav-link {
color: white;
}
.navbar-light .navbar-brand {
color: white;
}
</style>