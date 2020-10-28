<link rel="stylesheet" href="{{ url('css/lateral-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/top-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/combos.css') }}">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<script src="jquery.ui.datepicker-es.js"></script>

<script>
    function agregarFila(){
    var x =document.getElementById("tablaprueba").insertRow(-1).innerHTML = '<td><input type="text" name="producto[]" /></td><td><input type="number" name="cant[]" /></td><td><input type="button" class="borrar" value="Eliminar" /></td>';
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
            <div class='body-create-combo'>
                <h3 class='titulo'>Agregar combo</h3>
                <div class='combo-props'>
                    <form action="{{url('/combos')}}" method="post">
                        {{csrf_field()}}
                        <div class='item-name'>
                            <label for="nombre">Nombre</label>
                            <input type="text" id="nombre" name="nombre"><br>
                        </div>
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
                                <button type="button" onclick="agregarFila()">Agregar Fila</button>
                                <button type="button" onclick="eliminarFila()" style="display:none">Eliminar Fila</button>
                            </div>
                        </div>
                        </div>                        
                        <div class='item-contribucion'>
                            <label for="contribucion"><b>Contribución simbólica</b></label>
                            <input type="number" id="contribucion" name="contribucion"><br>
                        </div>
                        <div class='item-contribucion'>
                            <label for="cantOrg"><b>Cantidad de combos por organización</b></label>
                            <input type="number" id="cantOrg" name="cantOrg"><br>
                        </div>
                        <div class='item-contribucion'>
                            <label for="stock"><b>Cantidad máxima de combos</b></label>
                            <input type="number" id="stock" name="stock"><br>
                        </div>
                        <div class='item-estado'>
                            <label>Estado</label>
                            <select id="estado" name="estado">                            
                                <option value='1'>Inactivo</option>
                                <option value='0'>Activo</option>
                            </select>
                        </div>
                        <div class='button-section'>
                            <button type="submit">Guardar</button>
                            <button type="submit">Cancelar</button>
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