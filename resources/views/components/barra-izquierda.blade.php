<div class='lateral-menu'>
    @if (Request::is('combos'))

    @else
        <!--MAL -->
    @endif
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
        @if (Request::is('solicitudes') or Request::is('organizaciones') or Request::is('notificacionPorAceptacion'))
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
        @if (Request::is('combos') or Request::is('calendar') or Request::is('combos/create') or Request::is('notificaciones') or Request::is('turnos/ver/*') or Request::is('combos/*') or Request::is('notificaciones')) 
            <a href="{{ url('/combos') }}" class='lateral-menu-item-color'>
        @else
            <a href="{{ url('/combos') }}" class='lateral-menu-item'>
        @endif
                <p class='lateral-menu-text-item'>Combos</p>
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
                <p class='lateral-menu-text-item'>Pedidos</p>
            </a>
        </div>
        @endcan
        @can('orga-solicitar-combo')
        <div>
        @if (Request::is('combos/solicitar/1'))
            <a href="{{ url('/combos/solicitar/1') }}" class='lateral-menu-item-color'>
        @else
            <a href="{{ url('/combos/solicitar/1') }}" class='lateral-menu-item'>
        @endif
                <p class='lateral-menu-text-item'>Solicitar Combo</p>
            </a>
        </div>
    @endcan

        <div>
        @if (Request::is('/combos/solicitarcombo') or Request::is('changePassword'))
            <a href="{{ url('/changePassword') }}" class='lateral-menu-item-color'>
        @else
            <a href="{{ url('/changePassword') }}" class='lateral-menu-item'>
        @endif
                <p class='lateral-menu-text-item'>Cambiar contraseña</p>
            </a>
        </div>
    </div>
    