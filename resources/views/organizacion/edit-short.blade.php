<link rel="stylesheet" href="{{ url('css/lateral-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/top-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/manage-social-area.css') }}">
<link rel="stylesheet" href="{{ url('css/solicitudes-organizacion.css') }}">
<link rel="stylesheet" href="{{ url('css/edit-short.css') }}">

@include('main')
@include('components.header')
@include('components.nav')
<div style='display:flex; flex-direction:column'>
<div class='general-container'>
<div class='lateral-menu'>
        @can('role-create')
        <div>
            <a href="{{ url('/addUser') }}" class='lateral-menu-item' title="Agregar usuario">
                <p class='lateral-menu-text-item'>Agregar usuario</p>
            </a>
        </div>
        @endcan
        @can('orga-mis-solicitudes')
        <div>
            <a href="{{ url('/estadoSolicitud') }}" class='lateral-menu-item'>                          
                <p class='lateral-menu-text-item'>Mis solicitudes</p>              
            </a>
        </div>
        @endcan
        @can('orga-mis-datos')
        <div>
            <a href="{{ url('/registro') }}" class='lateral-menu-item'>         
                <p class='lateral-menu-text-item'>Modificar mis datos</p>
            </a>
        </div>
        @endcan
        @can('organizacion-list') 
        <div>
            <a href="{{ url('/solicitudes') }}" class='lateral-menu-item-color' title="Gestión de área social">           
                <p class='lateral-menu-text-item'><b>Gestion área social</b></p>
            </a>
        </div>
        @endcan
        @can('combo-list')
        <div>
            <a href="{{ url('/combos') }}" class='lateral-menu-item' title="Sector combos">                          
                <p class='lateral-menu-text-item'>Combos</p>              
            </a>
        </div>
        @endcan
        @can('orga-solicitar-combo')
        <div>
            <a href="{{ url('/') }}" class='lateral-menu-item'>
                <p class='lateral-menu-text-item'>Solicitar Combo</p>
            </a>
        </div>
        @endcan
        <div>
            <a href="{{ url('/changePassword') }}" class='lateral-menu-item' title="Cambiar contraseña">         
                <p class='lateral-menu-text-item'>Cambiar contraseña</p>
            </a>
        </div>
    </div>



<link rel="stylesheet" href="{{ url('css/lateral-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/top-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/regitroOrganizacion.css') }}">
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<br>

<script>
function calcular(){
  var uno = document.getElementsByName("uno")[0].value;
  var dos = document.getElementsByName("dos")[0].value;
  var tres = document.getElementsByName("tres")[0].value;
  var cuatro = document.getElementsByName("cuatro")[0].value;
  var cinco = document.getElementsByName("cinco")[0].value;
  var seis = document.getElementsByName("seis")[0].value;
  document.getElementsByName("resultado")[0].value = parseInt(uno) + parseInt(dos) + parseInt(tres) + parseInt(cuatro) + parseInt(cinco) + parseInt(seis);
}

function desbloquear(){
  var uno = document.form.gridRadios.value;
  if (uno == 'no'){
    document.form.municipio.disabled=false;
    document.form.estados.disabled = false;
    document.form.movimiento.disabled = false;
    document.form.otro.disabled = false;
  }
  if (uno == 'si'){
    document.form.municipio.disabled=true;
    document.form.estados.disabled = true;
    document.form.movimiento.disabled = true;
    document.form.otro.disabled = true;
  }

  //document.getElementsByName("total_servicio")[0].value = parseInt(uno) + parseInt(dos) + parseInt(tres) + parseInt(cuatro) + parseInt(cinco);
}


function bloquear(){
  alert('No puede modificar este campo. Comunicarse con el banco de alimentos.');  
}

function alerta(){
  alert('No se puede modificar el campo seleccionado.');
}


</script>

<div class='body-modificar-datos'>
  <div class='body-request'>
    <h3 class="letra">Modificar mis datos</h3>
    <form action="{{ url('/editShort')}}" method='post' class="was-validated" name="form">
    <input type="hiden" style="display:none" name="id" value={{$organizacione->id}}>
      {{csrf_field()}}
      <div class="form-group row">
        <label for="validationServer03" class="col-sm-3 col-form-label letra">*Nombre de la institución:</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="nombre" id="nombre_institucion" required value="{{$organizacione->nombre}}">
        </div>
      </div>
      <div class="form-group row">
        <label for="validationServer03" class="col-sm-3 col-form-label letra" onclick="javascript:alerta();">*Nombre del referente:</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" id="referente"  value="{{$organizacione->user->name}}" disabled="true">
        </div>
      </div>
      <div class="form-group row">
        <label for="validationServer03" class="col-sm-3 col-form-label letra" onclick="javascript:alerta();">*Email inicio sesión:</label>
        <div class="col-sm-4">
          <input type="email" class="form-control" id="referente" value="{{$organizacione->user->email}}" disabled>
        </div>
      </div>
      <div class="form-group row">
        <label for="validationServer03" class="col-sm-3 col-form-label letra">*Teléfono / Celular</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="telefono"  id="inputPassword3" required value="{{$organizacione->telefono}}">
        </div>
      </div>
      <div class="form-group row">
        <label for="validationServer03" class="col-sm-3 col-form-label letra">*Domicilio (barrio):</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="domicilio" id="inputPassword3" required value="{{$organizacione->domicilio}}">
        </div>
      </div>
      <div class="form-group row">
        <label for="validationServer03" class="col-sm-3 col-form-label letra">*Localidad:</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="localidad" id="inputPassword3" required value="{{$organizacione->localidad}}">
        </div>
      </div>
      <fieldset class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-2 pt-0 letra">*¿Personería jurídica?</legend>
          <div class="col-sm-10">
            <div class="form-check">
                @if($organizacione->personeria_juridica == 1)
                <input class="form-check-input" type="radio" name="personeria" id="gridRadios1" onclick="javascript:desbloquear();" value=1 checked disabled>
                <label class="form-check-label" for="gridRadios3">
                    <b>Si</b>
                </label>
                @else
                <input class="form-check-input" type="radio" name="personeria" id="gridRadios2" onclick="javascript:desbloquear();" value=0 checked disabled>
                <label class="form-check-label" for="gridRadios2">
                    <b>No</b>
                </label>
                @endif
            </div>
          </div>
        </div>
      </fieldset>
      @if($organizacione->personeria_juridica == 0)
      <div class="form-group row">
        <div class="col-sm-2 letra">* En caso negativo, ¿tiene algún aval?</div>
        <div class="col-sm-10">
        <br>
        <br>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1" name="municipio" id="municipio" value=1 disabled="true" @if($organizacione->personeria_juridica == 1) checked @endif>
            <label class="form-check-label" for="gridCheck1">
                <b>Municipio</b>
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1" name="movimiento" id="movimiento"  value=4 disabled="true"@if($organizacione->personeria_juridica == 2) checked @endif>
            <label class="form-check-label" for="gridCheck1">
                <b>Movimiento social</b>
            </label>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-1 col-form-label">*Otro:</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" id="nombre_institucion" required name="otro" id="otro" disabled="true" value="{{$organizacione->txt_aval}}">
            </div>
          </div>
        </div>
      </div>
      @endif
      <h3 class="letra">* Tipos de servicio por día:</h3>
      <h5 class="letra">¿A qué cantidad de personas se les brinda el servicio?</h5>
      <table class="table table-bordered" style="background-color:grey; width:0%" name="cantPersonas">
      <thead>
        <tr>
          <th class='center-item' scope="col">Desayuno</th>
          <th class='center-item' scope="col">Almuerzo</th>
          <th class='center-item' scope="col">Merienda</th>
          <th class='center-item' scope="col">Cena</th>
          <th class='center-item' scope="col">Bolsón</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class='center-item'>
            <div class="form-group col-md-2">
              <input type="number" style="width:60px; height:30px;" disabled value="{{$organizacione->cantPersonasServicios[0]->cant}}" class="form" min="0" pattern="^[0-9]+" id="desayuno" name="desayuno">
            </div>
          </td>
          <td class='center-item'>
            <div class="form-group col-md-2">
              <input type="number" style="width:60px; height:30px;" disabled value="{{$organizacione->cantPersonasServicios[1]->cant}}" class="form"  min="0" pattern="^[0-9]+" id="almuerzo" name="almuerzo">
            </div>
          </td>
          <td class='center-item'>
            <div class="form-group col-md-2">
              <input type="number" style="width:60px; height:30px;" disabled value="{{$organizacione->cantPersonasServicios[2]->cant}}" class="form"  min="0" pattern="^[0-9]+" id="merienda" name="merienda">
            </div>
          </td>
          <td class='center-item'>
            <div class="form-group col-md-2">
              <input type="number" style="width:60px; height:30px;" disabled value="{{$organizacione->cantPersonasServicios[3]->cant}}" class="form"  min="0" pattern="^[0-9]+" id="cena" name="cena">
            </div>
          </td>
          <td class='center-item'>
            <div class="form-group col-md-2">
              <input type="number" style="width:60px; height:30px;" disabled value="{{$organizacione->cantPersonasServicios[4]->cant}}" class="form"  min="0" pattern="^[0-9]+" id="bolson" name="bolson">
            </div>
          </td>
        </tr>
      </tbody>
    </table>
    <br>
    <h5 class="letra">Edad de los beneficiarios</h5>
      <table class="table table-bordered" style="background-color:grey; width:0%" name="edadPersonas">
      <thead>
        <tr>
          <th class='center-item' scope="col">0-2</th>
          <th class='center-item' scope="col">3-5</th>
          <th class='center-item' scope="col">6-12</th>
          <th class='center-item' scope="col">13-18</th>
          <th class='center-item' scope="col">19-65</th>
          <th class='center-item' scope="col">+65</th>
          <th class='center-item' scope="col">Total</th>
        </tr>
      </thead>
      <tbody>
      <tr>
          <td>
            <div class="form-group col-md-2">
              <input type="number" style="width:60px; height:30px;" disabled value="{{$organizacione->cantPersonasEdads[0]->cant}}"  min="0" pattern="^[0-9]+" class="form" onchange="javascript:calcular();" id="uno" name="uno">
            </div>
          </td>
          <td>
            <div class="form-group col-md-2">
              <input type="number" style="width:60px; height:30px;" disabled value="{{$organizacione->cantPersonasEdads[1]->cant}}"  min="0" pattern="^[0-9]+" class="form" onchange="javascript:calcular();" id="dos" name="dos">
            </div>
          </td>
          <td>
            <div class="form-group col-md-2">
              <input type="number" style="width:60px; height:30px;" disabled value="{{$organizacione->cantPersonasEdads[2]->cant}}"  min="0" pattern="^[0-9]+" class="form" onchange="javascript:calcular();" id="tres" name="tres">
            </div>
          </td>
          <td>
            <div class="form-group col-md-2">
              <input type="number" style="width:60px; height:30px;" disabled value="{{$organizacione->cantPersonasEdads[3]->cant}}"  min="0" pattern="^[0-9]+" class="form" onchange="javascript:calcular();" id="cuatro" name="cuatro">
            </div>
          </td>
          <td>
            <div class="form-group col-md-2">
              <input type="number" style="width:60px; height:30px;" disabled value="{{$organizacione->cantPersonasEdads[4]->cant}}"  min="0" pattern="^[0-9]+" class="form" onchange="javascript:calcular();" id="cinco" name="cinco">
            </div>
          </td>
          <td>
            <div class="form-group col-md-2">
              <input type="number" style="width:60px; height:30px;" disabled value="{{$organizacione->cantPersonasEdads[5]->cant}}"  min="0" pattern="^[0-9]+" class="form" onchange="javascript:calcular();" id="seis" name="seis">
            </div>
          </td>
          <td>
          <div class="form-group col-md-2">
              <input type="text" style="width:60px; height:30px;" disabled value="{{$organizacione->cantPersonasEdads[6]->cant}}" class="form" id="resultado" name="resultado" readonly="true">
          </div>
          </td>
        </tr>
      </tbody>
    </table>
    <br>
    <h5 class="letra">Raciones por día del servicio</h5>
      <table class="table table-bordered" style="background-color:grey; margin-bottom:0rem; width:0%" name="raciones" >
      <thead>
        <tr>
          <th class='center-item' scope="col"></th>
          <th class='center-item' scope="col">Lunes</th>
          <th class='center-item' scope="col">Martes</th>
          <th class='center-item' scope="col">Miercoles</th>
          <th class='center-item' scope="col">Jueves</th>
          <th class='center-item' scope="col">Viernes</th>
          <th class='center-item' scope="col">Sabado</th>
          <th class='center-item' scope="col">Domingo</th>
          <th class='center-item' scope="col">Franja horaria</th>
        </tr>
      </thead>
      <tbody>
      <tr>
          <td>Desayuno</td>
          <td class='center-item'><div class="form-check">
            @if($organizacione->cantRacionesDias[0]->lunes)
                <input class="form-check-input" type="checkbox" id="DL" name="DL" value=1 checked disabled>&nbsp;
            @else
                <input class="form-check-input" type="checkbox" id="DL" name="DL" value=1 disabled >&nbsp;
            @endif
          </div></td>
          <td class='center-item'><div class="form-check">
            @if($organizacione->cantRacionesDias[0]->martes)
                <input class="form-check-input" type="checkbox" id="DMA" name="DMA" value=1 disabled checked>
            @else
                <input class="form-check-input" type="checkbox" id="DMA" name="DMA" value=1 disabled>
            @endif
          </div></td>
          <td class='center-item'><div class="form-check">
            @if($organizacione->cantRacionesDias[0]->miercoles)
                <input class="form-check-input" type="checkbox" id="DMI" name="DMI" value=1 disabled checked>
            @else
                <input class="form-check-input" type="checkbox" id="DMI" name="DMI" value=1 disabled>
            @endif
          </div></td>
          <td class='center-item'><div class="form-check">
            @if($organizacione->cantRacionesDias[0]->jueves)
                <input class="form-check-input" type="checkbox" id="DJ" name="DJ" value=1 disabled checked>
            @else
                <input class="form-check-input" type="checkbox" id="DJ" name="DJ" value=1 disabled>
            @endif
          </div></td>
          <td class='center-item'><div class="form-check">
            @if($organizacione->cantRacionesDias[0]->viernes)
                <input class="form-check-input" type="checkbox" id="DV" name="DV" value=1 disabled checked>
            @else
                <input class="form-check-input" type="checkbox" id="DV" name="DV" value=1 disabled>
            @endif
          </div></td>
          <td class='center-item'><div class="form-check">
            @if($organizacione->cantRacionesDias[0]->sabado)
                <input class="form-check-input" type="checkbox" id="DS" name="DS" value=1 disabled checked>
            @else
                <input class="form-check-input" type="checkbox" id="DS" name="DS" value=1 disabled>
            @endif
          </div>
          </td>
          <td class='center-item'>
          <div class="form-check">
            @if($organizacione->cantRacionesDias[0]->domingo)
                <input class="form-check-input" type="checkbox" id="DD" name="DD" value=1 disabled checked>
            @else
                <input class="form-check-input" type="checkbox" id="DD" name="DD" value=1 disabled>
            @endif
          </div>
          </td>
          
          <td class='center-item'>
            <table class="table table-bordered" style="background-color:grey; width:0%" name="cantPersonas">
              <thead>
                <th class='center-item' scope="col">Desde</th>
                <th class='center-item' scope="col">Hasta</th>
              </thead>
              <tbody>
              <tr>
                <td class='center-item'>
                    {{$organizacione->cantRacionesDias[0]->desde}}
                </td>
                <td class='center-item'>
                    {{$organizacione->cantRacionesDias[0]->hasta}}
                </td>
              </tr>
              </tbody>
            </table>
         </td>
        </tr>
        <tr>
          <td>Almuerzo</td>
          <td class='center-item'><div class="form-check">
            @if($organizacione->cantRacionesDias[1]->lunes)
                <input class="form-check-input" type="checkbox" id="AL" name="AL" value=1 checked disabled>&nbsp;
            @else
                <input class="form-check-input" type="checkbox" id="AL" name="AL" value=1 disabled>&nbsp;
            @endif
          </div></td>
          <td class='center-item'><div class="form-check">
            @if($organizacione->cantRacionesDias[1]->martes)
                <input class="form-check-input" type="checkbox" id="AMA" name="AMA" value=1 checked disabled>
            @else
                <input class="form-check-input" type="checkbox" id="AMA" name="AMA" value=1 disabled>
            @endif
          </div></td>
          <td class='center-item'><div class="form-check">
            @if($organizacione->cantRacionesDias[1]->miercoles)
                <input class="form-check-input" type="checkbox" id="AMI" name="AMI" value=1 checked disabled>
            @else
                <input class="form-check-input" type="checkbox" id="AMI" name="AMI" value=1 disabled>
            @endif
          </div></td>
          <td class='center-item'><div class="form-check">
            @if($organizacione->cantRacionesDias[1]->jueves)
                <input class="form-check-input" type="checkbox" id="AJ" name="AJ" value=1 checked disabled>
            @else
                <input class="form-check-input" type="checkbox" id="AJ" name="AJ" value=1 disabled>
            @endif
          </div></td>
          <td class='center-item'><div class="form-check">
            @if($organizacione->cantRacionesDias[1]->viernes)
                <input class="form-check-input" type="checkbox" id="AV" name="AV" value=1 checked disabled>
            @else
                <input class="form-check-input" type="checkbox" id="AV" name="AV" value=1 disabled>
            @endif
          </div></td>
          <td class='center-item'><div class="form-check">
            @if($organizacione->cantRacionesDias[1]->sabado)
                <input class="form-check-input" type="checkbox" id="AS" name="AS" value=1 checked disabled>
            @else
                <input class="form-check-input" type="checkbox" id="AS" name="AS" value=1 disabled>
            @endif
          </div></td>
          <td class='center-item'><div class="form-check">
            @if($organizacione->cantRacionesDias[1]->domingo)
                <input class="form-check-input" type="checkbox" id="AD" name="AD" value=1 checked disabled>
            @else
                <input class="form-check-input" type="checkbox" id="AD" name="AD" value=1 disabled>
            @endif
          </div></td>
          <td class='center-item'>
            <table class="table table-bordered" style="background-color:grey;" name="cantPersonas">
              <thead>
                <th class='center-item' scope="col">Desde</th>
                <th class='center-item' scope="col">Hasta</th>
              </thead>
              <tbody>
              <tr>
                <td class='center-item'>
                    {{$organizacione->cantRacionesDias[1]->desde}}
                </td>
                <td class='center-item'>
                    {{$organizacione->cantRacionesDias[1]->hasta}}
                </td>
              </tr>
              </tbody>
            </table>
         </td>
        </tr>
        <tr>
          <td>Merienda</td>
          <td class='center-item'><div class="form-check">
            @if($organizacione->cantRacionesDias[2]->lunes)
                <input class="form-check-input" type="checkbox" id="ML" name="ML" value=1 disabled checked>&nbsp;
            @else
                <input class="form-check-input" type="checkbox" id="ML" name="ML" value=1 disabled>&nbsp;
            @endif
          </div></td>
          <td class='center-item'><div class="form-check">
            @if($organizacione->cantRacionesDias[2]->martes)
                <input class="form-check-input" type="checkbox" id="MMA" name="MMA" value=1 checked disabled>
            @else
                <input class="form-check-input" type="checkbox" id="MMA" name="MMA" value=1 disabled>
            @endif

          </div></td>
          <td class='center-item'><div class="form-check">
            @if($organizacione->cantRacionesDias[2]->miercoles)
                <input class="form-check-input" type="checkbox" id="MMI" name="MMI" value=1 checked disabled>
            @else
                <input class="form-check-input" type="checkbox" id="MMI" name="MMI" value=1 disabled>
            @endif
          </div></td>
          <td class='center-item'><div class="form-check">
            @if($organizacione->cantRacionesDias[2]->jueves)
                <input class="form-check-input" type="checkbox" id="MJ" name="MJ" value=1 checked disabled>
            @else
                <input class="form-check-input" type="checkbox" id="MJ" name="MJ" value=1 disabled>
            @endif
          </div></td>
          <td class='center-item'><div class="form-check">
            @if($organizacione->cantRacionesDias[2]->viernes)
                <input class="form-check-input" type="checkbox" id="MV" name="MV" value=1 checked disabled>
            @else
                <input class="form-check-input" type="checkbox" id="MV" name="MV" value=1 disabled>
            @endif
          </div></td>
          <td class='center-item'><div class="form-check">
            @if($organizacione->cantRacionesDias[2]->sabado)
                <input class="form-check-input" type="checkbox" id="MS" name="MS" value=1 checked disabled>
            @else
                <input class="form-check-input" type="checkbox" id="MS" name="MS" value=1 disabled>
            @endif
          </div></td>
          <td class='center-item'><div class="form-check">
            @if($organizacione->cantRacionesDias[2]->domingo)
                <input class="form-check-input" type="checkbox" id="MD" name="MD" value=1 checked disabled>
            @else
                <input class="form-check-input" type="checkbox" id="MD" name="MD" value=1 disabled>
            @endif
          </div></td>
          <td class='center-item'>
            <table class="table table-bordered" style="background-color:grey;" name="cantPersonas">
              <thead>
                <th class='center-item' scope="col">Desde</th>
                <th class='center-item' scope="col">Hasta</th>
              </thead>
              <tbody>
              <tr>
                <td class='center-item'>
                    {{$organizacione->cantRacionesDias[2]->desde}}
                </td>
                <td class='center-item'>
                    {{$organizacione->cantRacionesDias[2]->hasta}}
                </td>
              </tr>
              </tbody>
            </table>
         </td>
        </tr>
        <tr>
          <td>Cena</td>
          <td class='center-item'><div class="form-check">
            @if($organizacione->cantRacionesDias[3]->lunes)
                <input class="form-check-input" type="checkbox" id="CL" name="CL" value=1 disabled checked>&nbsp;
            @else
                <input class="form-check-input" type="checkbox" id="CL" name="CL" value=1 disabled>&nbsp;
            @endif
          </div></td>
          <td class='center-item'><div class="form-check">
            @if($organizacione->cantRacionesDias[3]->martes)
                <input class="form-check-input" type="checkbox" id="CMA" name="CMA" value=1 disabled checked>
            @else
                <input class="form-check-input" type="checkbox" id="CMA" name="CMA" value=1 disabled>
            @endif
          </div></td>
          <td class='center-item'><div class="form-check">
            @if($organizacione->cantRacionesDias[3]->miercoles)
                <input class="form-check-input" type="checkbox" id="CMI" name="CMI" value=1 disabled checked>
            @else
                <input class="form-check-input" type="checkbox" id="CMI" name="CMI" value=1 disabled>
            @endif
          </div></td>
          <td class='center-item'><div class="form-check">
            @if($organizacione->cantRacionesDias[3]->jueves)
                <input class="form-check-input" type="checkbox" id="CJ" name="CJ" value=1 disabled checked>
            @else
                <input class="form-check-input" type="checkbox" id="CJ" name="CJ" value=1 disabled>
            @endif
          </div></td>
          <td class='center-item'><div class="form-check">
            @if($organizacione->cantRacionesDias[3]->viernes)
                <input class="form-check-input" type="checkbox" id="CV" name="CV" value=1 disabled checked>
            @else
                <input class="form-check-input" type="checkbox" id="CV" name="CV" value=1 disabled>
            @endif
          </div></td>
          <td class='center-item'><div class="form-check">
            @if($organizacione->cantRacionesDias[3]->sabado)
                <input class="form-check-input" type="checkbox" id="CS" name="CS" value=1 disabled checked>
            @else
                <input class="form-check-input" type="checkbox" id="CS" name="CS" value=1 disabled>
            @endif
          </div></td>
          <td class='center-item'><div class="form-check">
            @if($organizacione->cantRacionesDias[3]->domingo)
                <input class="form-check-input" type="checkbox" id="CD" name="CD" value=1 disabled checked>
            @else
                <input class="form-check-input" type="checkbox" id="CS" name="CS" value=1 disabled>
            @endif
          </div></td>
          <td class='center-item'>
            <table class="table table-bordered" style="background-color:grey;" name="cantPersonas">
              <thead>
                <th class='center-item' scope="col">Desde</th>
                <th class='center-item' scope="col">Hasta</th>
              </thead>
              <tbody>
              <tr>
                <td class='center-item'>
                    {{$organizacione->cantRacionesDias[3]->desde}}
                </td>
                <td class='center-item'>
                    {{$organizacione->cantRacionesDias[3]->hasta}}
                </td>
              </tr>
              </tbody>
            </table>
         </td>
        </tr>
      </tbody>
    </table>
    <div class="form-group row">
        <div class="col-sm-2 letra" onclick="javascript:bloquear();">*¿Tiene ayuda alimentaria?</div>
        <div class="col-sm-10">
        <br>
        <br>
        <div class="col-sm-10">
            <div class="form-check">
            <input class="form-check-input" type="checkbox" name="personeria" id="gridRadios1"  value=1 checked disabled>
              <label class="form-check-label" for="gridRadios1">
                @if($organizacione->ayuda_alimentaria == 1 )
                    <b>Publica</b>
                    <br>
                    <input type="text" value="{{$organizacione->txt_alimentaria}}" disabled />
                @endif
                @if($organizacione->ayuda_alimentaria == 3 )
                    <b>no tiene</b>
                @endif
                @if($organizacione->ayuda_alimentaria == 2 )
                    <b>Privada</b>
                    <br>
                    <input type="text" value="{{$organizacione->txt_otra_alimentaria}}" disabled/>
                @endif
              </label>
            </div>
          </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-2 letra">*¿Recibe ayuda financiera?</div>
        <div class="col-sm-10">
        <br>
        <br>
        <div class="col-sm-10">
            <div class="form-check">
            <input class="form-check-input" type="checkbox" name="personeria" id="gridRadios2"  value=1 checked disabled>
              <label class="form-check-label" for="gridRadios2">
                @if($organizacione->ayuda_financiera == 1 )
                    <b>Publica</b>
                    <br>
                    <input type="text" value="{{$organizacione->txt_financiera}}" disabled/>
                @endif
                @if($organizacione->ayuda_financiera == 3 )
                    <b>No tiene</b>
                @endif
                @if($organizacione->ayuda_financiera == 2 )
                    <b>Privada</b>
                    <br>
                    <input type="text" value="{{$organizacione->txt_otra_financiera}}" disabled/>
                @endif
              </label>
            </div>
          </div>
        </div>
    </div>
    <div class="mb-3">
        <label for="validationTextarea" class="letra">*Breve párrafo explicativo de la tarea que realizan</label>
        <textarea class="form-control is-invalid" name="tarea" id="validationTextarea" placeholder="Agregue una explicación" required>{{$organizacione->tarea}}</textarea>
        <div class="invalid-feedback">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-12 text-right">
          <button type="submit" class="accept">Enviar</button>
        </div>
      </div>
    </form>
    </div>
</div>
</div>
  <div>
    @include('components.footer')
  </div>
</div>