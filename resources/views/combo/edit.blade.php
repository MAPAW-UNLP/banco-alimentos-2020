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
        <a href="{{ url('/solicitudes') }}" class='top-menu-item-color'>
          <p class='top-menu-text-item'><b>Empadronamientos</b></p>
        </a>
      </div>
      <div>
        <a href="{{ url('/organizaciones') }}" class='top-menu-item'>
          <p class='top-menu-text-item'>Datos de Organizaciones</p>
        </a>
      </div>
      <div>
        <a href="{{ url('/modificaciones') }}" class='top-menu-item'>
          <p class='top-menu-text-item'>Modificaciones pendientes</p>
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
            <label for="contribucion">Contribución simbólica</label>
            <input type="number" id="contribucion" name="contribucion" value="{{$combo->contribucion}}"><br>
          </div>
          <div class='form-select-item'>
            <label for="stock">Stock</label>
            <select id="rol_id" name="rol_id">                            
              <option value='3'>Stock</option>
              <option value='4'>Agotado</option>
            </select>
          </div>
          <label for="cantOrg"></label><br>
          <input type="number" id="cantOrg" name="cantOrg" value="{{$combo->cantOrg}}"><br>

              <label for="estado"></label><br>
          <input type="number" id="estado" name="estado" value="{{$combo->estado}}"><br>
          <input type="submit" value="Guardar">
        </form>
      </div>
    </div>
  </div>
</div>
@include('components.footer')
