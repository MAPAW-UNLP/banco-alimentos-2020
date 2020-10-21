<link rel="stylesheet" href="{{ url('css/lateral-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/top-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/manage-social-area.css') }}">

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
            <a href="{{ url('/manageSocialArea') }}" class='lateral-menu-item-color'>           
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
                <a href="{{ url('/manageSocialArea/pendingModification') }}" class='top-menu-item'>
                    <p class='top-menu-text-item'>Modificaciones pendientes</p>
                </a> 
            </div>   
        </nav> 
        <div class='body'>
            <div class='body-request'>
                <h3>Solicitudes de empadronamiento</h3>
                @foreach($modificaciones as $modificacione)
                <div class='request-section'>
                
                    <div class='request-section-text'>
                        <p><b>Nombre institución:</b> {{$modificacione->nombre}}</p>
                        <p><b>Nombre del referente:</b> {{$modificacione->organizacione->user->name}}</p>
                        <p><b>Domicilio (barrio):</b> {{$modificacione->barrio}}</p>
                        <p><b>¿Personería jurídica?:</b> {{$modificacione->personeria_juridica}}</p>
                        <p><b>En caso negativo, ¿tiene algún aval?:</b> {{$modificacione->aval}}</p>
                        <p><b>Cantidad de personas:</b> {{$modificacione->cantPers}}</p>
                        <p><b>Edad por rango:</b> {{$modificacione->edad}}</p>
                        <p><b>Tipos de servicio por día:</b> {{$modificacione->tarea}}</p>
                        <p><b>¿Tiene ayuda alimentaria?:</b> {{$modificacione->ayuda_alimentaria}}</p>
                        <p><b>¿Recibe ayuda financiera?:</b> {{$modificacione->ayuda_financiera}}</p>
                        <p><b>Tarea que realizan:</b> {{$modificacione->tipo_servicio}}</p>
                    </div>
                    <div class='buttons-section'>
                        <button type="cancel" class='reject-button'>Rechazar</button>
                        <a href="{{ url('/aceptarModificacion/'.$modificacione->id) }}" class='top-menu-item'>Aceptar</a>                        
                    </div>
                </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</div>