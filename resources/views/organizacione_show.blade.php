@include('main')
@include('components.header')
@include('components.nav')
<link rel="stylesheet" href="{{ url('css/lateral-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/top-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/manage-social-area.css') }}">

<script>
    function rechazar($id) {
        var txt;
        var person = prompt("Motivo del rechazo:","");
        if (person == null || person == "") {
            txt = "User cancelled the prompt.";
        } else {
            document.getElementById("motivo").value = person;
            document.getElementById("organizacion_id").value = $id;
            document.getElementById("myForm").submit();
            }
    }      
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
    @can('orga-mis-solicitudes')
        <div>
            <a href="{{ url('/estadoSolicitud') }}" class='lateral-menu-item'>                          
                <p class='lateral-menu-text-item'>Mis solicitudes</p>              
            </a>
        </div>
    @endcan
    @can('orga-mis-datos')
        <div>
          <a href="{{ url('/registro') }}" class='lateral-menu-item'>         
              <p class='lateral-menu-text-item'>Modificar mis datos</p>
          </a>
        </div>
    @endcan
    @can('organizacion-list') 
        <div>
            <a href="{{ url('/solicitudes') }}" class='lateral-menu-item-color'>           
                <p class='lateral-menu-text-item'><b>Gestion área social</b></p>
            </a>
        </div>
    @endcan
    @can('combo-list')
        <div>
            <a href="{{ url('/combos') }}" class='lateral-menu-item'>                          
                <p class='lateral-menu-text-item'>Combos</p>              
            </a>
        </div>
    @endcan
    @can('orga-solicitar-combo')
        <div>
            <a href="{{ url('/') }}" class='lateral-menu-item'>
                <p class='lateral-menu-text-item'>Solicitar Combo</p>
            </a>
        </div>
    @endcan
        <div>
            <a href="{{ url('/changePassword') }}" class='lateral-menu-item'>         
                <p class='lateral-menu-text-item'>Cambiar contraseña</p>
            </a>
        </div>
    </div>
    <div>
        <nav class='top-menu'>
            <div>
                <a href="{{ url('/solicitudes') }}" class='top-menu-item-color'>
                    <p class='top-menu-text-item'><b>Empadronamientos</b></p>
                </a>
            </div>
            <div>
                <a href="{{ url('/organizaciones') }}" class='top-menu-item'>
                    <p class='top-menu-text-item'>Datos de Organizaciones</p>
                </a>
            </div>
            <div>
                <a href="{{ url('/notificacionPorAceptacion') }}" class='top-menu-item'>
                    <p class='top-menu-text-item'>Notificación por aceptación</p>
                </a> 
            </div>   
        </nav> 
        <div class='body'>
            <div class='body-request'>
                <h3>Solicitudes de empadronamiento</h3>

                <div class='request-section'>
                    <div class='request-section-text'>
                    <p><b>Nombre institución:</b> {{$organizacione->nombre}}</p>
                        <p><b>Nombre del referente:</b> {{$organizacione->user->name}}</p>
                        <p><b>Domicilio (barrio):</b> {{$organizacione->barrio}}</p>
                        <p><b>¿Personería jurídica?:</b> {{$organizacione->personeria_juridica}}</p>
                        <p><b>En caso negativo, ¿tiene algún aval?:</b> {{$organizacione->aval}}</p>
                        <p><b>Cantidad de personas:</b> {{$organizacione->cantPers}}</p>
                        <p><b>Edad por rango:</b> {{$organizacione->edad}}</p>
                        <p><b>Tipos de servicio por día:</b> {{$organizacione->tarea}}</p>
                        <p><b>¿Tiene ayuda alimentaria?:</b> {{$organizacione->ayuda_alimentaria}}</p>
                        <p><b>¿Recibe ayuda financiera?:</b> {{$organizacione->ayuda_financiera}}</p>
                        <p><b>Tarea que realizan:</b> {{$organizacione->tipo_servicio}}</p>
                    </div>
                    <div class='buttons-section'>
                        <button type="cancel" class='reject-button' onclick="rechazar({{$organizacione->id}})" style="background-color: #dc3545;">Rechazar</button>
                        <button type="submit" style="background-color: #103965"><a href="{{ url('/aceptarOrg/'.$organizacione->id) }}">Aceptar</a> </button>                        
                    </div>
                </div>
                </div>
            </div>
        </div>
        <form id="myForm" action="{{ url('/rechazar') }}" method="post">
            {{csrf_field()}}
            <input type="hidden" id="motivo" name="motivo">
            <input type="hidden" id="organizacion_id" name="organizacion_id">
        </form>
    </div>
</div>