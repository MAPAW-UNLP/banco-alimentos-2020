<link rel="stylesheet" href="{{ url('css/lateral-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/combos.css') }}">
<link rel="stylesheet" href="{{ url('css/manage-social-area-organization-data.css') }}">
<link rel="stylesheet" href="{{ url('css/top-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/calendar.css') }}">
<script>
    function changeStatus($path) {
        window.location=$path;
    }
</script>
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
                    <a href="{{ url('/combos') }}" class='top-menu-item'>
                        <p class='top-menu-text-item'>Listado</p>
                    </a>
                </div>
                <div>
                    <a href="{{ url('/calendar') }}" class='top-menu-item-color'>
                    <p class='top-menu-text-item'><b>Calendario</b></p>
                    </a>
                </div>
                <div>
                    <a href="{{ url('/notificaciones') }}" class='top-menu-item'>
                    <p class='top-menu-text-item'>Notificaciones</p>
                    </a> 
                </div>   
            </nav>
            <form action="{{url('/turnos')}}" method="POST">
            {{method_field('POST')}}
            {{csrf_field()}}
            <div class='conteiner body'>
                <div class="row" align="center">
                    <h3>Calendario</h3>
                    <div class="col">
                        <h5>Seleccionar día</h5>
                        <div id="datepicker" name="date"></div>
                        <input type="date" id="fechaHora" name="fechaHora">
                    </div>
                    <div class="col">
                        <h5>Seleccionar horario</h5>
                        <table class="table table-bordered" WIDTH="50" style="background-color: #FFFFFF; text-align:center;" >
                            <thead>
                                <tr>
                                    <th scope="col">Horarios</th>
                                    <th scope="col">Cantidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($horarios as $horario)
                                <tr>
                                
                                    <td scope="row" style=" text-align:left;">
                                            <input type="checkbox" name="check[]" value="{{$horario->id}}" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                <b>{{$horario->nombre}}</b> 
                                            </label>
                                            <br>
                                    </td>
                                    <td>
                                        <select name="cant[]">
                                            @for ($i = 0; $i <= 10; $i++)
                                                <option value="{{ $i }}" >{{ $i }}</option>
                                            @endfor
                                        </select>
                                        <br>
                                    </td>
                                
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <button type="reset" style="background-color: #ff0000;">Cancelar</button> 
                        <button>Guardar</button>         
                    </div>                   
                </div>
            </form>
            </div>
            </div>
        </div>
    </div>
</div>



<meta charset="utf-8" />
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<script src="jquery.ui.datepicker-es.js"></script>

<script>
$(function () {
$.datepicker.setDefaults($.datepicker.regional["es"]);
$("#datepicker").datepicker({
firstDay: 1
});
});
</script>

