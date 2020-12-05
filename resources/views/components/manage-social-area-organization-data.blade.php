<link rel="stylesheet" href="{{ url('css/lateral-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/top-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/manage-social-area.css') }}">
<link rel="stylesheet" href="{{ url('css/manage-social-area-organization-data.css') }}">

<script>
    function changeStatus($path) {
        window.location=$path;
    }
</script>

<script>
    function asignarId($id) {
        var txt;
        var person = prompt("Ingrese el Id para la organizacion:","");
        if (person == null || person == "") {
            txt = "User cancelled the prompt.";
        } else {
            document.getElementById("motivo").value = person;
            document.getElementById("organizacion_id").value = $id;
            document.getElementById("asignarId").submit();
            }
    }
</script>

<div class='general-container'>
@include('components.barra-izquierda')
    <div>
        <nav class='top-menu'>
            <div>
                <a href="{{ url('/solicitudes') }}" class='top-menu-item'>
                    <p class='top-menu-text-item'>Empadronamientos</p>
                </a>
            </div>
            <div>
                <a href="{{ url('/organizaciones') }}" class='top-menu-item-color'>
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
                    <form id="myForm" action="{{ url('/organizacion/busqueda') }}" method="post">
                        @csrf
                        <input name="stringbusqueda" style="margin-right:10px" type="text"><button>Buscar</button>
                    </form>

                    </div>
                </div>
                @if(count($organizaciones) > 0)
                <table class="organization-table">
                    <thead>
                        <tr class="color-white">
                            <th style="width:10%;">ID</th>
                            <th style="width:25%;">Nombre</th>
                            <th style="width:15%;">&nbsp;</th>
                            <th style="width:15%;">&nbsp;</th>
                            <th style="width:15%;">&nbsp;</th>
                            <th style="width:20%;" class="align-center">Inactivo / Activo</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($organizaciones as $organizacione)
                            <tr>
                                <td class="background-white align-center"><b>{{$organizacione->organizacion_id}}</b></td>
                                <td class="background-white"><b>{{$organizacione->nombre}}</b></td>
                                <td class="background-white align-center"><div style="background-color:#f2994a" class='request-section-item-link'><a href="{{url('organizacione/show/'.$organizacione->id)}}" style="background-color:#f2994a;">Ver más</a></div></td>
                                <td class="background-white align-center"><div class='request-section-item-link'><a href="{{url('organizacione/edit-short/'.$organizacione->id)}}">Modificar datos</a></div></td>
                                @if ($organizacione->organizacion_id == null)
                                    <td><button type="cancel" class='reject-button' onclick="asignarId({{$organizacione->id}})" style="background-color: #dc3545;">Asginar ID</button></div></td>
                                @else
                                    <td></td>
                                @endif
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
                    </tbody>
                </table>
                @else
                    <h5>No hay datos de organizaciones</h5>
                @endif
            </div>
        </div>
    </div>
        <form id="asignarId" action="{{ url('/asignarId') }}" method="post">
            {{csrf_field()}}
            <input type="hidden" id="motivo" name="motivo">
            <input type="hidden" id="organizacion_id" name="organizacion_id">
        </form>
</div>
