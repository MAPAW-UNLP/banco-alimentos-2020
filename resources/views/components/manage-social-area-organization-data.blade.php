<link rel="stylesheet" href="{{ url('css/lateral-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/top-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/manage-social-area.css') }}">
<link rel="stylesheet" href="{{ url('css/manage-social-area-organization-data.css') }}">

<script>
    function changeStatus($path) {
        window.location=$path;
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
        <div>
            <a href="{{ url('/changePassword') }}" class='lateral-menu-item'>         
                <p class='lateral-menu-text-item'>Cambiar contraseña</p>
            </a>
        </div>
        <div>
            <a href="{{ url('/solicitudes') }}" class='lateral-menu-item-color'>           
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
                <a href="{{ url('/solicitudes/organizationData') }}" class='top-menu-item-color'>
                    <p class='top-menu-text-item'><b>Datos de Organizaciones</b></p>
                </a>
            </div>
            <div>
                <a href="{{ url('/notificacionPorAceptacion') }}" class='top-menu-item'>
                    <p class='top-menu-text-item'>Notificación por aceptación</p>
                </a> 
            </div>   
        </nav> 
        <div class='body'>
            <div class='body-organization-data'>
                <div class='header-section'>
                    <h3>Organizaciones</h3>
                    <div class="request-section" >
                        <input type="text"><button><a href="{{ url('/#') }}">Buscar</a></button>
                    </div>
                </div>
                <div class='titles-section'>
                    <div><p>ID</p></div> 
                    <div><p>Nombre de la organización</p></div>
                    <div><p>&nbsp;</p></div> 
                    <div><p>&nbsp;</p></div> 
                    <div><p>&nbsp;</p></div>    
                    <div style="padding-right:0;"><p>Inactivo / Activo</p></div>            
                </div>                
                @foreach($organizaciones as $organizacione)
                <div class='request-section'>
                    <div class='request-section-item-id'>
                        {{$organizacione->id}}
                    </div>
                    <div class='request-section-item'>
                        {{$organizacione->nombre}}
                    </div>
                    <div class='request-section-item'>
                        <div class='request-section-item-link'><a href="{{url('organizacione/show/'.$organizacione->id)}}">Ver más</a></div>
                    </div>
                    <div class='request-section-item'>
                        <div class='request-section-item-link'><a href="{{url('organizacione/edit-short/'.$organizacione->id)}}">Modificar datos</a></div>
                    </div>
                    <div class='request-section-item'>
                    <div class='request-section-item-link'><a href="">Cargar datos vista</a></div>
                    </div>
                    <div class='switch-section'>
                        <label class="switch">
                        @if(($organizacione->estado) == 1)
                            <input type="checkbox" id="check" onclick="changeStatus('{{ url('/cambiarOrga/'.$organizacione->id) }}')" value="{{ $organizacione->estado }}" checked >
                        @endif
                        @if(($organizacione->estado) == 0)
                            <input type="checkbox" id="check" onclick="changeStatus('{{ url('/cambiarOrga/'.$organizacione->id) }}')" value="{{ $organizacione->estado }}" >
                        @endif
                            <span class="slider round"></span>
                        </label>                       
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>