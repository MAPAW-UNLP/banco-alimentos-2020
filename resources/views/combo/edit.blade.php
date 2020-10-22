<link rel="stylesheet" href="{{ url('css/lateral-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/top-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/combos.css') }}">
@include('main')
@include('components.header')
@include('components.nav')

<div class='general-container'>
  <div class='lateral-menu'>
    <div>
      <a href="{{ url('/addUser') }}" class='lateral-menu-item'>
        <p class='lateral-menu-text-item'>Agregar usuario</p>
      </a>
    </div>
    <div>
      <a href="{{ url('/changePassword') }}" class='lateral-menu-item'>         
        <p class='lateral-menu-text-item'>Cambiar contraseña</p>
      </a>
    </div>
    <div>
      <a href="{{ url('/solicitudes') }}" class='lateral-menu-item'>           
        <p class='lateral-menu-text-item'>Gestion área social</p>
      </a>
    </div>
    <div>
      <a href="{{ url('/combos') }}" class='lateral-menu-item-color'>                          
        <p class='lateral-menu-text-item'><b>Combos</b></p>              
      </a>
    </div>
  </div>
  <div>
    <nav class='top-menu'>
      <div>
        <a href="{{ url('/combos') }}" class='top-menu-item-color'>
          <p class='top-menu-text-item'><b>Listado</b></p>
        </a>
      </div>
      <div>
        <a href="{{ url('/calendar') }}" class='top-menu-item'>
          <p class='top-menu-text-item'>Calendario</p>
        </a>
      </div>
      <div>
        <a href="{{ url('/notificaciones') }}" class='top-menu-item'>
          <p class='top-menu-text-item'>Notificaciones</p>
        </a> 
      </div>   
    </nav>  
    <div class='body'>
    <h3>Combos</h3>
    <div class='body-form'>
        <div class='body-form-combo'>
        <h4>Productos del combo</h4>
        <p>Productos</>
        <form action="{{url('/combos/'.$combo->id)}}" method="post">
        {{method_field('PATCH')}}
            {{csrf_field()}}
            @foreach($combo->productos as $producto)
            <div>
              <input type="text" name="producto[]" value="{{$producto->producto}}"/>
              <input type="number" name="cant[]" value="{{$producto->cantidad}}"/>
            </div>
            @endforeach
          </div>
          <div class='item-contribucion'> 
            <label for="contribucion"><b>Contribución simbólica $</b></label>
            <input type="number" id="contribucion" name="contribucion" value="{{$combo->contribucion}}"><br>
          </div>
          <div class='item-contribucion'>
            <label for="cantOrg"><b>Cantidad de combos por Organización</b></label><br>
            <input type="number" id="cantOrg" name="cantOrg" value="{{$combo->cantOrg}}"><br>
          </div>
          <div class='item-contribucion'>
            <label for="cantOrg"><b>Cantidad máxima de combos</label></b><br>
            <input type="number" id="cantOrg" name="cantOrg" value="{{$combo->cantOrg}}"><br>
          </div>
          <div class='guardar'><button type="submit">Guardar</button></div>
        </form>
      </div>
    </div>
  </div>
</div>
@include('components.footer')
