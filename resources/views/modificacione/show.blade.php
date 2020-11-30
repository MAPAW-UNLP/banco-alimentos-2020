@include('main')
@include('components.header')
@include('components.nav')
<link rel="stylesheet" href="{{ url('css/lateral-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/top-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/manage-social-area.css') }}">

<script>
    function rechazar($id) {
        var txt;
        var person = prompt("Motivo del rechazo:","");
        if (person == null || person == "") {
            txt = "User cancelled the prompt.";
        } else {
            document.getElementById("motivo").value = person;
            document.getElementById("organizacion_id").value = $id;
            document.getElementById("myForm").submit();
            }
    }      
</script>

<div class='general-container'>
@include('components.barra-izquierda')
    <div>
        <nav class='top-menu'>
            <div>
                <a href="{{ url('/solicitudes') }}" class='top-menu-item-color'>
                    <p class='top-menu-text-item'><b>Empadronamientos</b></p>
                </a>
            </div>
            <div>
                <a href="{{ url('/organizaciones') }}" class='top-menu-item'>
                    <p class='top-menu-text-item'>Datos de Organizaciones</p>
                </a>
            </div>
            <div>
                <a href="{{ url('/notificacionPorAceptacion') }}" class='top-menu-item'>
                    <p class='top-menu-text-item'>Notificación por aceptación</p>
                </a> 
            </div>   
        </nav> 
        <div class='body'>
            <div class='body-request'>
                <h3>Solicitudes de empadronamiento</h3>

                <div class='request-section'>
                    <div class='request-section-text'>
                    <p><b>Nombre institución:</b> {{$modificacione->nombre}}</p>
                        <p><b>Domicilio (barrio):</b> {{$modificacione->domicilio}}</p>
                        <p><b>¿Personería jurídica?:</b> {{$modificacione->personeria_juridica}}</p>
                        <p><b>En caso negativo, ¿tiene algún aval?:</b> {{$modificacione->aval}}</p>
                        <p><b>Cantidad de personas:</b> {{$modificacione->cantPers}}</p>
                        <p><b>Edad por rango:</b> {{$modificacione->edad}}</p>
                        <p><b>Tipos de servicio por día:</b> {{$modificacione->tarea}}</p>
                        <p><b>¿Tiene ayuda alimentaria?:</b> {{$modificacione->ayuda_alimentaria}}</p>
                        <p><b>¿Recibe ayuda financiera?:</b> {{$modificacione->ayuda_financiera}}</p>
                        <p><b>Tarea que realizan:</b> {{$modificacione->tipo_servicio}}</p>
                    </div>
                    <div class='buttons-section'>
                        <button type="cancel" class='reject-button' onclick="rechazar({{$modificacione->id}})" style="background-color: #dc3545;">Rechazar</button>
                        <button type="submit" style="background-color: #103965"><a href="{{ url('/aceptarModificacion/'.$modificacione->id) }}">Aceptar</a> </button>                        
                    </div>
                </div>
                </div>
            </div>
        </div>
        <form id="myForm" action="{{ url('/rechazar') }}" method="post">
            {{csrf_field()}}
            <input type="hidden" id="motivo" name="motivo">
            <input type="hidden" id="organizacion_id" name="organizacion_id">
        </form>
    </div>
</div>