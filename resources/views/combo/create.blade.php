<link rel="stylesheet" href="{{ url('css/lateral-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/top-menu.css') }}">

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
                    <a href="{{ url('/organizaciones') }}" class='top-menu-item'>
                    <p class='top-menu-text-item'>Calendario</p>
                    </a>
                </div>
                <div>
                    <a href="{{ url('/modificaciones') }}" class='top-menu-item'>
                    <p class='top-menu-text-item'>Notificaciones</p>
                    </a> 
                </div>   
            </nav> 
            <div class='body'>
              <h3>Craer combo</h3>
              <div>
                <form action="{{url('/combos')}}" method="post">
                    {{csrf_field()}}
                <label for="nombre">nombre</label><br>
                <input type="text" id="nombre" name="nombre"><br>
                <label for="stock">stock</label><br>
                <input type="number" id="stock" name="stock"><br>
                <label for="cantOrg">cantOrg</label><br>
                <input type="number" id="cantOrg" name="cantOrg"><br>
                <label for="contribucion">contribucion</label><br>
                <input type="number" id="contribucion" name="contribucion"><br>
                <label for="estado">estado</label><br>
                <input type="number" id="estado" name="estado"><br>
              <table>
              <tr>
                <td><input type="text" name="producto[]" /></td>
                <td><input type="number" name="cant[]" /></td>
              </tr>
              <tr>
                <td><input type="text" name="producto[]" /></td>
                <td><input type="number" name="cant[]" /></td>
              </tr>
            <table>
            <input type="submit" value="Editar">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@include('components.footer')