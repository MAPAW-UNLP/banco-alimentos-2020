<link rel="stylesheet" href="{{ url('css/lateral-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/combos.css') }}">
<link rel="stylesheet" href="{{ url('css/manage-social-area-organization-data.css') }}">
<link rel="stylesheet" href="{{ url('css/top-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/calendar.css') }}">
<link rel="stylesheet" href="{{ url('css/notificaciones.css') }}">
<script>
    function changeStatus($path) {
        window.location=$path;
    }
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
                    <a href="{{ url('/combos') }}" class='top-menu-item'>
                        <p class='top-menu-text-item'>Listado</p>
                    </a>
                </div>
                <div>
                    <a href="{{ url('/calendar') }}" class='top-menu-item'>
                    <p class='top-menu-text-item'>Calendario</p>
                    </a>
                </div>
                <div>
                    <a href="{{ url('/notificaciones') }}" class='top-menu-item-color'>
                    <p class='top-menu-text-item'><b>Notificaciones</b></p>
                    </a> 
                </div>   
            </nav> 
            <div class='body'>
                <div class='body-notificacion'>
                    <h3>Modificar notificación</h3>
                    <div class='ingresar-contenido'>
                        <h5>Ingresar contenido de la organización</h5>
                        <div class='recuerde'><p>Recuerde</p>
                            <textarea></textarea>
                        </div>
                    </div>
                </div>               
            </div>
        </div>
    </div>
</div>
@include('components.footer')