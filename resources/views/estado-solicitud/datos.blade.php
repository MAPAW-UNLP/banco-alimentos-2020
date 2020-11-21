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
    <div class='body'>
        <div class='body-request'>
        <h3>Datos</h3>
        <div class='estado-solicitud-solicitud-body'>
            <p><b>Nombre institución:</b> $organizacione->nombre</p>
            <p><b>Nombre del referente:</b> $organizacione->user->name</p>
            <p><b>Domicilio (barrio):</b> $organizacione->barrio</p>
            <p><b>¿Personería jurídica?:</b> $organizacione->personeria_juridica</p>
            <p><b>En caso negativo, ¿tiene algún aval?:</b> $organizacione->aval</p>
            <p><b>Cantidad de personas:</b> $organizacione->cantPers</p>
            <p><b>Edad por rango:</b>$organizacione->edad</p>
            <p><b>Tipos de servicio por día:</b>$organizacione->tarea</p>
            <p><b>¿Tiene ayuda alimentaria?:</b>$organizacione->ayuda_alimentaria</p>
            <p><b>¿Recibe ayuda financiera?:</b>$organizacione->ayuda_financiera</p>
            <p><b>Tarea que realizan:</b>$organizacione->tipo_servicio</p>
        </div>
    </div>
</div>
</div>
@include('components.footer')