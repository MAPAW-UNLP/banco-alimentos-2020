<div class='lateral-menu'>
    @can('role-create')
        <div>
        @if (Request::is('addUser'))
            <a href="{{ url('/addUser') }}" class='lateral-menu-item-color'>
        @else
            <a href="{{ url('/addUser') }}" class='lateral-menu-item'>
        @endif
                <p class='lateral-menu-text-item'>Agregar usuario</p>
            </a>
        </div>
    @endcan
    @can('orga-mis-solicitudes')
        <div>
        @if (Request::is('estadoSolicitud'))
            <a href="{{ url('/estadoSolicitud') }}" class='lateral-menu-item-color'>      
        @else 
            <a href="{{ url('/estadoSolicitud') }}" class='lateral-menu-item'>    
        @endif                   
                <p class='lateral-menu-text-item'>Mis solicitudes</p>              
            </a>
        </div>
        @endcan
    @can('orga-mis-datos')
        <div>
        @if (Request::is('registro'))
            <a href="{{ url('/registro') }}" class='lateral-menu-item-color'>  
        @else  
            <a href="{{ url('/registro') }}" class='lateral-menu-item'> 
        @endif     
                <p class='lateral-menu-text-item'>Modificar mis datos</p>
            </a>
        </div>
        @endcan
    @can('organizacion-list')
        <div>
        @if (Request::is('solicitudes'))
            <a href="{{ url('/solicitudes') }}" class='lateral-menu-item-color'>         
        @else   
            <a href="{{ url('/solicitudes') }}" class='lateral-menu-item'>
        @endif  
                <p class='lateral-menu-text-item'>Gestion área social</p>
            </a>
        </div>
        @endcan
        @can('combo-list')
        <div>
        @if (Request::is('combos') or Request::is('calendar') or Request::is('combos/create'))
            <a href="{{ url('/combos') }}" class='lateral-menu-item-color'>
        @else   
            <a href="{{ url('/combos') }}" class='lateral-menu-item'>
        @endif                        
                <p class='lateral-menu-text-item'><b>Combos</b></p>              
            </a>
        </div>
        @endcan
        @can('combo-list')
        <div>
        @if (Request::is('pedidos'))
            <a href="{{ url('/pedidos') }}" class='lateral-menu-item-color'>
        @else   
            <a href="{{ url('/pedidos') }}" class='lateral-menu-item'>
        @endif                        
                <p class='lateral-menu-text-item'><b>Pedidos</b></p>              
            </a>
        </div>
        @endcan
        @can('orga-solicitar-combo')
        <div>
        @if (Request::is('/combos/solicitarcombo'))
            <a href="{{ url('/combos/solicitar/1') }}" class='lateral-menu-item-color'> 
        @else
            <a href="{{ url('/combos/solicitar/1') }}" class='lateral-menu-item'> 
        @endif                         
                <p class='lateral-menu-text-item'>Solicitar Combo</p>              
            </a>
        </div>
    @endcan
    
        <div>
        @if (Request::is('/combos/solicitarcombo'))
            <a href="{{ url('/changePassword') }}" class='lateral-menu-item-color'>
        @else
            <a href="{{ url('/changePassword') }}" class='lateral-menu-item'>
        @endif
                <p class='lateral-menu-text-item'>Cambiar contraseña</p>
            </a>
        </div>
    </div>