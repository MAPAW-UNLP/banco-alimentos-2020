<link rel="stylesheet" href="{{ url('css/lateral-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/top-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/combos.css') }}">
@include('main')
@include('components.header')
@include('components.nav')
<script>
    function agregarFila(){
    var x =document.getElementById("tablaprueba").insertRow(-1).innerHTML = '<td><input type="text" name="producto[]" required /></td><td><input type="number" name="cant[]" required/></td><td><input type="button" class="borrar" value="Eliminar" /></td>';
    }

    function eliminarFila(){
    var table = document.getElementById("tablaprueba");
    var rowCount = table.rows.length;
    
    if(rowCount <= 1)
        alert('No se puede eliminar el encabezado');
    else
        table.deleteRow(rowCount -1);
    }

    $(document).on('click', '.borrar', function (event) {
    event.preventDefault();
    $(this).closest('tr').remove();
});
</script>
<div class='general-container'>
  <div class='lateral-menu'>
  @can('role-create')
    <div>
      <a href="{{ url('/addUser') }}" class='lateral-menu-item'>
        <p class='lateral-menu-text-item'>Agregar usuario</p>
      </a>
    </div>
  @endcan
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
        <h4 class='list-combo-title'>Productos del combo</h4>
        <form action="{{url('/combos/'.$combo->id)}}" method="post">
        {{method_field('PATCH')}}
            {{csrf_field()}}
            <div class="container">
              <div class="row">
                  <table style="background-color: #F2994A; border-radius:10px" class="table table-borderless table-sm" id="tablaprueba">
                      <thead>
                          <tr>
                          <th>Producto</th>
                          <th>Cantidad</th>
                          </tr>
                      </thead>
                      <tbody>
                      @foreach($combo->productos as $producto)
                      <tr>
                        <td><input type="text" name="producto[]" value="{{$producto->producto}}" required/></td>
                        <td><input type="number" name="cant[]" value="{{$producto->cantidad}}" required/></td>
                        <td><input type="button" class="borrar" value="Eliminar" /></td>
                      </tr>
                      @endforeach
                      </tbody>
                  </table>
                  <div class="form-group">
                      <button class='add-row' type="button" onclick="agregarFila()">Agregar Fila</button>
                      <button type="button" onclick="eliminarFila()" style="display:none">Eliminar Fila</button>
                  </div>
              </div>
              </div> 
          </div>
          <div class='item-contribucion'> 
            <label for="contribucion"><b>Contribución simbólica $</b></label>
            <input type="number" id="contribucion" name="contribucion" value="{{$combo->contribucion}}" required><br>
          </div>
          <div class='item-contribucion'>
            <label for="cantOrg"><b>Cantidad de combos por Organización</b></label><br>
            <input type="number" id="cantOrg" name="cantOrg" value="{{$combo->cantOrg}}" required><br>
          </div>
          <div class='item-contribucion'>
            <label for="cantOrg"><b>Cantidad máxima de combos</label></b><br>
            <input type="number" id="stock" name="stock" value="{{$combo->stock}}" required><br>
          </div>
          <div class='buttons-section'>
          <button class='cancel' onclick="window.location='{{ url("combos") }}'">Cancelar</button>
              <button class='accept'>Guardar</button>                                 
          </div>          
        </form>
      </div>
    </div>
  </div>
</div>
@include('components.footer')
