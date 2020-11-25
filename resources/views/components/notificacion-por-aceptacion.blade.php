<link rel="stylesheet" href="{{ url('css/lateral-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/combos.css') }}">
<link rel="stylesheet" href="{{ url('css/manage-social-area-organization-data.css') }}">
<link rel="stylesheet" href="{{ url('css/top-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/notificaciones.css') }}">
<script>
    function changeStatus($path) {
        window.location=$path;
    }
    function guardar() {
        alert("Agregar llamar back para guardar");        
    }

</script>

@include('main')
@include('components.header')
@include('components.nav')
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
            <a href="{{ url('/solicitudes') }}" class='lateral-menu-item-color'>           
                <p class='lateral-menu-text-item'><b>Gestion área social</b></p>
            </a>
        </div>
        <div>
            <a href="{{ url('/combos') }}" class='lateral-menu-item'>                          
                <p class='lateral-menu-text-item'>Combos</p>              
            </a>
        </div>
    </div>
        <div>
            <nav class='top-menu'>
                <div>
                    <a href="{{ url('/solicitudes') }}" class='top-menu-item'>
                        <p class='top-menu-text-item'>Empadronamientos</p>
                    </a>
                </div>
                <div>
                    <a href="{{ url('/organizaciones') }}" class='top-menu-item'>
                        <p class='top-menu-text-item'>Datos de Organizaciones</p>
                    </a>
                </div>
                <div>
                    <a href="{{ url('/notificacionPorAceptacion') }}" class='top-menu-item-color'>
                        <p class='top-menu-text-item'><b>Notificación por aceptación</b></p>
                    </a> 
                </div>   
            </nav> 
            <div class='body'>
                <div class='body-notificacion'>
                    <h3>Notificación por aceptación</h3>
                    <form id="myForm" action="{{ url('/notificacionAceptacion') }}" method="post">
                        {{csrf_field()}} 
                    <div class='ingresar-contenido'>
                        <h5>Contenido del mail que se envía a una organización</h5>
                        <div class='recuerde'>
                            <textarea id="notificacion" name="notificacion" required>{{ $notificacion->notificacion }}</textarea>
                        </div>                     
                    </div>  
                    <div class='button-section'>
                        <button class="create-save" type="submit" >Guardar</button>   
                    </div>   
                    </form>
                    </div>
                </div>               
            </div>
        </div>
    </div>
</div>
@include('components.footer')