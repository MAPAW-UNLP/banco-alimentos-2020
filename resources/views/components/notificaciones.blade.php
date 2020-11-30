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

<div class='general-container'>
@include('components.barra-izquierda')
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
                    <form id="myForm" action="{{ url('/notificaciones') }}" method="post">
                        {{csrf_field()}} 
                    <div class='ingresar-contenido'>
                        <h5>Ingresar contenido de la organización</h5>
                        <div class='recuerde'><p>Recuerde:</p>
                            <textarea id="notificacion" name="notificacion" >{{$notificacion->notificacion}}</textarea>
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