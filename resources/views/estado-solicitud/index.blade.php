<link rel="stylesheet" href="{{ url('css/lateral-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/top-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/manage-social-area.css') }}">
<link rel="stylesheet" href="{{ url('css/solicitudes-organizacion.css') }}">

@include('main')
@include('components.header')
@include('components.nav')
<div class='general-container'>
    <div class='lateral-menu'>
        <div>
            <a href="{{ url('/') }}" class='lateral-menu-item'>
                <p class='lateral-menu-text-item'>Solicitar Combo</p>
            </a>
        </div>
        <div>
            <a href="{{ url('/edit/1') }}" class='lateral-menu-item'>         
                <p class='lateral-menu-text-item'>Modificar mis datos</p>
            </a>
        </div>
        <div>
            <a href="{{ url('/changePassword') }}" class='lateral-menu-item'>           
                <p class='lateral-menu-text-item'>Cambiar contraseña</p>
            </a>
        </div>
        <div>
            <a href="{{ url('/estadoSolicitud') }}" class='lateral-menu-item-color'>                          
                <p class='lateral-menu-text-item'><b>Mis solicitudes</b></p>              
            </a>
        </div>
    </div>
    <div class='body'>
        <div class='body-request'>
            <h3>Solicitudes</h3>
            <div class='solicitudes-body'>
              <div class='datos-body'>
                <h4 class='font-white'>Datos</h4>
                <div class='solicitudes-tabla'>
                  <div class='request-section-text'>  
                    <p><b>Nombre institución: Caritas</b></p> 
                  </div>
                  <div class='buttons-section'>
                    <button type="submit" class='show-more'><a href="{{ url('/estadoSolicitud/solicitudDatos') }}">Ver mas</a></button>                     
                  </div>
                </div>              
            </div>
            <div class='combos-body'>
                <h4 class='font-white'>Combos</h4>
                <div class='solicitudes-tabla'>
                  <div class='request-section-text'>  
                    <p><b>Combo 1</b></p>
                  </div> 
                  <div class='buttons-section'>
                    <button type="submit" class='show-more'><a href="{{ url('/estadoSolicitud/solicitudCombos')}}">Ver mas</a></button>                     
                  </div>
                </div>              
            </div>
        </div>
    </div>
    </div>
</div>
@include('components.footer')