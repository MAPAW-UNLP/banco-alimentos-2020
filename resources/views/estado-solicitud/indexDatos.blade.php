<link rel="stylesheet" href="{{ url('css/lateral-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/manage-social-area.css') }}">
<link rel="stylesheet" href="{{ url('css/solicitudes-organizacion.css') }}">
<link rel="stylesheet" href="{{ url('css/estado-solicitud.css') }}">

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
            <a href="{{ url('/') }}" class='lateral-menu-item'>         
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
    <div class='general-body'>
      <nav class='top-menu'>
        <div>
            <a href="{{ url('/estadoSolicitud') }}" class='top-menu-item'>
                <p class='top-menu-text-item'>Solicitud de Combos</p>
            </a>
        </div>
        <div>
            <a href="{{ url('/estadoSolicitud/indexDatos') }}" class='top-menu-item-color'>
                <p class='top-menu-text-item'><b>Solicitud de Datos</b></p>
            </a>
        </div>  
      </nav> 
    <div class='body'>
        <div class='body-request'>
          <h3>Solicitudes de Datos</h3>
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
            </div>
        </div>
    </div>
  </div>
</div>
@include('components.footer')