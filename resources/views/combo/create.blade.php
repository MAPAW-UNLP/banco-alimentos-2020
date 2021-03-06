<link rel="stylesheet" href="{{ url('css/lateral-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/top-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/combos.css') }}">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<script src="jquery.ui.datepicker-es.js"></script>

<script>
    function agregarFila(){
    var x =document.getElementById("tablaprueba").insertRow(-1).innerHTML = 
    '<td><input class="input-text-style" type="text" name="producto[]" required/></td><td><input class="mini-input" style="width:22%;height: 30px;" type="number" min=0 name="cant[]" required/></td><td><button type="button" class="borrar"/><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/></svg></td>';
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

(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if(tablaprueba.rows.length == 1){
            event.preventDefault();
            event.stopPropagation();
            alert('Agregue productos al combo');
        }
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

@include('main')
@include('components.header')
@include('components.nav')
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
            <div class='body-create-combo'>
                <h3 class='titulo'>Agregar combo</h3>
                <div class='combo-props'>
                    <form action="{{url('/combos')}}" method="post" class='needs-validation'> 
                        {{csrf_field()}}
                        <div class='item-name'>
                            <label for="nombre">Nombre</label>
                            <input class="input-text-style" type="text" id="nombre" name="nombre" required><br>
                        </div>
                        <br>
                        <br>
                        <div class="container">
                        <div class="row">
                            <table style="background-color: #F2994A; border-radius:10px" class="table table-borderless table-sm" id="tablaprueba">
                                <thead>
                                    <tr>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                            <div class="form-group">
                                <button class='add-row' type="button" onclick="agregarFila()">Agregar Fila</button>
                                <button type="button" onclick="eliminarFila()" style="display:none">Eliminar Fila</button>
                            </div>
                        </div>
                        </div>                        
                        <div class='item-contribucion'>
                            <label for="contribucion"><b>Contribución simbólica</b></label>
                            <input min=0 class="mini-input" type="number" id="contribucion" name="contribucion" required><br>
                        </div>
                        <div class='item-contribucion'>
                            <label for="cantOrg"><b>Cantidad de combos por organización</b></label>
                            <input min=0 class="mini-input" type="number" id="cantOrg" name="cantOrg" required><br>
                        </div>
                        <div class='item-contribucion'>
                            <label for="stock"><b>Cantidad máxima de combos</b></label>
                            <input min=0 class="mini-input" type="number" id="stock" name="stock" required><br>
                        </div>
                        <div class='item-estado'>
                            <label>Estado</label>
                            <select id="estado" name="estado">                            
                                <option value='0'>Inactivo</option>
                                <option value='1'>Activo</option>
                            </select>
                        </div>
                        <div class='button-section'>
                            <button class='cancel' onclick="window.location='{{ url("combos") }}'">Cancelar</button>
                            <button class='create-save' type="submit">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
  </div>
</div>
@include('components.footer')