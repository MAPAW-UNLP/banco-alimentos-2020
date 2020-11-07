<link rel="stylesheet" href="{{ url('css/lateral-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/top-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/manage-social-area.css') }}">

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
                <a href="{{ url('/modificaciones') }}" class='top-menu-item-color'>
                    <p class='top-menu-text-item'><b>Modificaciones pendientes</b></p>
                </a> 
            </div>   
        </nav> 
        <div class='body'>
            <div class='body-request'>
                <h3>Modificaciones Pendientes</h3>
                @if(count($modificaciones) > 0)
                    @foreach($modificaciones as $modificacione)
                    <div class='request-section'>                
                        <div class='request-section-text'>
                            <p><b>Nombre institución:</b> {{$modificacione->nombre}}</p>
                        </div>
                        <div class='modificaciones-buttons-section'>
                        <button type="submit" class='show-more'><a href="{{ url('/modificaciones/'.$modificacione->id) }}">Ver mas</a></button>                 
                        </div>
                    </div>
                    @endforeach
                @else
                    <div>No hay Modificaciones pendientes</div>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@include('components.footer')