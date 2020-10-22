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
            <div class='body'>
                <div class='body-calendar'>
                    <h3>Calendario</h3>
                    <h5>Seleccionar día y horario</h5>
                        <div id="datepicker"></div>
                </div>
                <table class="table table-bordered" WIDTH="50">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                        </tr>
                    </tbody>
                </table>            
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
