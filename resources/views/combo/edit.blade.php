<link rel="stylesheet" href="{{ url('css/lateral-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/top-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/combos.css') }}">
@include('main')
@include('components.header')
@include('components.nav')
<script>
    function agregarFila(){
    var x =document.getElementById("tablaprueba").insertRow(-1).innerHTML = '<td><input class="input-text-style" type="text" name="producto[]" required/></td><td><input class="mini-input" style="width:25%;height:27px;" type="number" min=0 name="cant[]" required/></td><td><button type="button" class="borrar"/><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/></svg></td>';
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
  @include('components.barra-izquierda')
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
                        <td><input min=0 allign="right" style="width:25%;height:27px" type="number" name="cant[]" value="{{$producto->cantidad}}" required/></td>
                        <td><button type="button" class="borrar">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                        </svg>
                      </button></td>
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
            <input min=0 class="mini-input" type="number" id="contribucion" name="contribucion" value="{{$combo->contribucion}}" required><br>
          </div>
          <div class='item-contribucion'>
            <label for="cantOrg"><b>Cantidad de combos por Organización</b></label><br>
            <input min=0 class="mini-input" type="number" id="cantOrg" name="cantOrg" value="{{$combo->cantOrg}}" required><br>
          </div>
          <div class='item-contribucion'>
            <label for="cantOrg"><b>Cantidad máxima de combos</label></b><br>
            <input min=0 class="mini-input" type="number" id="stock" name="stock" value="{{$combo->stock}}" required><br>
          </div>
          <br>
          <br>

          <div class='buttons-section'>                              
            <input type='button' class='cancel' onclick="window.location='{{ url("combos") }}'" value="Cancelar" style="color:white; border-color:#dc3545;">
            <button class='accept'>Guardar</button>                                 
          </div>          
        </form>
      </div>
    </div>
  </div>
</div>
@include('components.footer')
