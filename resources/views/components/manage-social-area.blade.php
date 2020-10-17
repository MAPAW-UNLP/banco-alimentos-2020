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
                <a href="{{ url('/manageSocialArea') }}" class='top-menu-item-color'>
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
                <div class='request-section'>
                    <div class='request-section-text'>
                        <p><b>Nombre institución:</b> xxxxxxx</p>
                        <p><b>Nombre del referente:</b> xxxxxx</p>
                        <p><b>Domicilio (barrio):</b> xxxxx</p>
                        <p><b>¿Personería jurídica?:</b> xx</p>
                        <p><b>En caso negativo, ¿tiene algún aval?:</b> xxxx</p>
                        <p><b>Cantidad de personas:</b> xxx</p>
                        <p><b>Edad por rango:</b> xx</p>
                        <p><b>Tipos de servicio por día:</b> tabla</p>
                        <p><b>¿Tiene ayuda alimentaria?:</b> xxxxxx</p>
                        <p><b>¿Recibe ayuda financiera?:</b> xxxxxx</p>
                        <p><b>Tarea que realizan:</b> xxxxxxxxxxxxxxxxxxxx</p>
                    </div>
                    <div class='buttons-section'>
                        <button type="cancel" class='reject-button'>Rechazar</button>
                        <button type="submit">Aceptar</button>                        
                    </div>
                </div>
                <div class='request-section'>
                    <div class='request-section-text'>
                        <p><b>Nombre institución:</b> xxxxxxx</p>
                        <p><b>Nombre del referente:</b> xxxxxx</p>
                        <p><b>Domicilio (barrio):</b> xxxxx</p>
                        <p><b>¿Personería jurídica?:</b> xx</p>
                        <p><b>En caso negativo, ¿tiene algún aval?:</b> xxxx</p>
                        <p><b>Cantidad de personas:</b> xxx</p>
                        <p><b>Edad por rango:</b> xx</p>
                        <p><b>Tipos de servicio por día:</b> tabla</p>
                        <p><b>¿Tiene ayuda alimentaria?:</b> xxxxxx</p>
                        <p><b>¿Recibe ayuda financiera?:</b> xxxxxx</p>
                        <p><b>Tarea que realizan:</b> xxxxxxxxxxxxxxxxxxxx</p>
                    </div>
                    <div class='buttons-section'>
                        <button type="cancel" class='reject-button'>Rechazar</button>
                        <button type="submit">Aceptar</button>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>