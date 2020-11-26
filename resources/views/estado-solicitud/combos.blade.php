<link rel="stylesheet" href="{{ url('css/lateral-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/manage-social-area.css') }}">
<link rel="stylesheet" href="{{ url('css/solicitudes-organizacion.css') }}">
<link rel="stylesheet" href="{{ url('css/estado-solicitud.css') }}">

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
        @can('orga-mis-solicitudes')
        <div>
            <a href="{{ url('/estadoSolicitud') }}" class='lateral-menu-item-color'>                          
                <p class='lateral-menu-text-item'><b>Mis solicitudes</b></p>              
            </a>
        </div>
        @endcan
        @can('orga-modificar-datos')
        <div>
            <a href="{{ url('/') }}" class='lateral-menu-item'>         
                <p class='lateral-menu-text-item'>Modificar mis datos</p>
            </a>
        </div>
        @endcan
        @can('organizacion-list') 
        <div>
          <a href="{{ url('/solicitudes') }}" class='lateral-menu-item'>           
              <p class='lateral-menu-text-item'>Gestion área social</p>
          </a>
        </div>
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
    <div class='general-body'>
      <nav class='top-menu'>
        <div>
            <a href="{{ url('/estadoSolicitud') }}" class='top-menu-item-color'>
                <p class='top-menu-text-item'><b>Solicitud de Combos</b></p>
            </a>
        </div>
        <div>
            <a href="{{ url('/estadoSolicitud/indexDatos') }}" class='top-menu-item'>
                <p class='top-menu-text-item'>Solicitud de Datos</p>
            </a>
        </div>  
      </nav> 
        <div class='body'>
            <div class='body-request'>
                <h3>Productos del combo: {{$combo->nombre}}</h3>
                <div class='estado-solicitud-combo-body'>
                    @if(count($combo->productos)> 0)
                        @foreach($combo->productos as $product)
                            <p>{{$product->cantidad}} {{$product->producto}}</p><br>
                        @endforeach
                    @else
                    <p>No hay productos en el combo</p><br>
                    @endif
                </div>
            </div>
            <div class='volver-listado'>
                <a href="{{ url('/estadoSolicitud') }}">
                    Volver al listado de solicitudes de combos
                </a>
            </div> 
        </div>
    </div>
</div>
@include('components.footer')