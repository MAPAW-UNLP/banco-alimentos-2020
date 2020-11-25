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
                    <div>
                        <input style="margin-right:10px" type="text"><button><a href="{{ url('/#') }}">Buscar</a></button>
                    </div>
                </div>
                <table class="organization-table">
                    <thead>
                        <tr class="color-white">
                            <th style="width:10%;">ID</th>
                            <th style="width:25%;">Nombre de la organización</th>
                            <th style="width:15%;">&nbsp;</th>
                            <th style="width:15%;">&nbsp;</th>
                            <th style="width:15%;">&nbsp;</th>
                            <th style="width:20%;" class="align-center">Inactivo / Activo</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(count($organizaciones) > 0)
                        @foreach($organizaciones as $organizacione)
                            <tr>
                                <td class="background-white align-center"><b>{{$organizacione->id}}</b></td>
                                <td class="background-white"><b>{{$organizacione->nombre}}</b></td>
                                <td class="background-white align-center"><div class='request-section-item-link'><a href="{{url('organizacione/show/'.$organizacione->id)}}">Ver más</a></div></td>
                                <td class="background-white align-center"><div class='request-section-item-link'><a href="{{url('organizacione/edit-short/'.$organizacione->id)}}">Modificar datos</a></div></td>
                                <td class="background-white align-center"><div class='request-section-item-link'><a href="">Cargar datos vista</a></div></td>
                                <td>
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
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr><td>No hay datos de organizaciones</td></tr>
                    @endif
                    </tbody>                    
                </table>            
            </div>
        </div>
    </div>
</div>