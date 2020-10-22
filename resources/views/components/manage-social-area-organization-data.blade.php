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
                <a href="{{ url('/modificaciones') }}" class='top-menu-item'>
                    <p class='top-menu-text-item'>Modificaciones pendientes</p>
                </a> 
            </div>   
        </nav> 
        <div class='body'>
            <div class='body-organization-data'>
                <div class='header-section'>
                    <h3>Organizaciones</h3>
                    <p>Inactivo / Activo</p>
                </div>
                @foreach($organizaciones as $organizacione)
                <div class='request-section'>
                    <div class='request-section-text'>
                        <p><b>Nombre institución:</b> {{$organizacione->nombre}}</p>
                        <p><b>Nombre del referente:</b> {{$organizacione->user->name}}</p>
                        <p><b>Domicilio (barrio):</b> {{$organizacione->barrio}}</p>
                        <p><b>¿Personería jurídica?:</b> {{$organizacione->personeria_juridica}}</p>
                        <p><b>En caso negativo, ¿tiene algún aval?:</b> {{$organizacione->aval}}</p>
                        <p><b>Cantidad de personas:</b> {{$organizacione->cantPers}}</p>
                        <p><b>Edad por rango:</b> {{$organizacione->edad}}</p>
                        <p><b>Tipos de servicio por día:</b> {{$organizacione->tarea}}</p>
                        <p><b>¿Tiene ayuda alimentaria?:</b> {{$organizacione->ayuda_alimentaria}}</p>
                        <p><b>¿Recibe ayuda financiera?:</b> {{$organizacione->ayuda_financiera}}</p>
                        <p><b>Tarea que realizan:</b> {{$organizacione->tipo_servicio}}</p>
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