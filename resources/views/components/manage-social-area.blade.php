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
                <a href="{{ url('/modificaciones') }}" class='top-menu-item'>
                    <p class='top-menu-text-item'>Modificaciones pendientes</p>
                </a> 
            </div>   
        </nav> 
        <div class='body'>
            <div class='body-request'>
                <h3>Solicitudes de empadronamiento</h3>
                @foreach($solicitudes as $solicitude)
                <div class='request-section'>
                    
                    <div class='request-section-text'>
                        <p><b>Id institución:</b> {{$solicitude->organizacione->id}}</p>
                    </div>
                    <div class='buttons-section'>
                        <button type="cancel" class='reject-button' onclick="rechazar({{$solicitude->organizacione->id}})">Rechazar</button>
                        <button type="submit"><a href="{{ url('/aceptarOrg/'.$solicitude->id) }}">Aceptar</a> </button>                        
                    </div>
                </div>
                @endforeach
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