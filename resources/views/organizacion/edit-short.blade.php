<link rel="stylesheet" href="{{ url('css/lateral-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/top-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/manage-social-area.css') }}">
<link rel="stylesheet" href="{{ url('css/solicitudes-organizacion.css') }}">

@include('main')
@include('components.header')
@include('components.nav')

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

<div class='body-registro'>
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
          <input type="email" class="form-control" id="referente" disabled>
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
          <input type="text" class="form-control" name="domicilio" id="inputPassword3" required value="{{$organizacione->barrio}}">
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
          <legend class="col-form-label col-sm-2 pt-0 letra" onclick="javascript:bloquear();">*¿Personería jurídica?</legend>
          <div class="col-sm-10">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" onclick="javascript:bloquear();" value="si" disabled>
              <label class="form-check-label" for="gridRadios1">
                Si
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" onclick="javascript:bloquear();" value="no" disabled>
              <label class="form-check-label" for="gridRadios2">
                No
              </label>
            </div>
          </div>
        </div>
      </fieldset>
      <div class="form-group row">
        <div class="col-sm-2 letra">* En caso negativo, ¿tiene algún aval?</div>
        <div class="col-sm-10">
        <br>
        <br>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1" name="municipio" id="municipio" disabled="true">
            <label class="form-check-label" for="gridCheck1">
              Municipio
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1" name="estados" id="estados" disabled="true"> 
            <label class="form-check-label" for="gridCheck1">
              Estado ¿cuál?
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1" name="movimiento" id="movimiento" disabled="true">
            <label class="form-check-label" for="gridCheck1">
              Movimiento social
            </label>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-1 col-form-label">*Otro:</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" id="nombre_institucion" required name="otro" id="otro" disabled="true">
            </div>
          </div>
        </div>
      </div>
      <h3 class="letra">* Tipos de servicio por día:</h3>
      <h5 class="letra">¿A qué cantidad de personas se les brinda el servicio?</h5>
      <table class="table table-bordered" style="background-color:grey;" onclick="javascript:bloquear();">
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
              <input type="number" style="width:60px; height:30px;" value="0" class="form" min="0" pattern="^[0-9]+" id="desayuno" name="desayuno" disabled>
            </div>
          </td>
          <td class='center-item'>
            <div class="form-group col-md-2">
              <input type="number" style="width:60px; height:30px;" value="0" class="form"  min="0" pattern="^[0-9]+" id="almuerzo" name="almuerzo" disabled>
            </div>
          </td>
          <td class='center-item'>
            <div class="form-group col-md-2">
              <input type="number" style="width:60px; height:30px;" value="0" class="form"  min="0" pattern="^[0-9]+" id="merienda" name="merienda" disabled>
            </div>
          </td>
          <td class='center-item'>
            <div class="form-group col-md-2">
              <input type="number" style="width:60px; height:30px;" value="0" class="form"  min="0" pattern="^[0-9]+" id="cena" name="cena" disabled>
            </div>
          </td>
          <td class='center-item'>
            <div class="form-group col-md-2">
              <input type="number" style="width:60px; height:30px;" value="0" class="form"  min="0" pattern="^[0-9]+" id="bolson" name="bolson" disabled>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
    <br>
    <h5 class="letra">Edad de los beneficiarios</h5>
      <table class="table table-bordered" style="background-color:grey;" onclick="javascript:bloquear();">
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
              <input type="number" style="width:60px; height:30px;" value="0"  min="0" pattern="^[0-9]+" class="form" onchange="javascript:calcular();" id="uno" name="uno" disabled>
            </div>
          </td>
          <td>
            <div class="form-group col-md-2">
              <input type="number" style="width:60px; height:30px;" value="0"  min="0" pattern="^[0-9]+" class="form" onchange="javascript:calcular();" id="dos" name="dos" disabled>
            </div>
          </td>
          <td>
            <div class="form-group col-md-2">
              <input type="number" style="width:60px; height:30px;" value="0"  min="0" pattern="^[0-9]+" class="form" onchange="javascript:calcular();" id="tres" name="tres" disabled>
            </div>
          </td>
          <td>
            <div class="form-group col-md-2">
              <input type="number" style="width:60px; height:30px;" value="0"  min="0" pattern="^[0-9]+" class="form" onchange="javascript:calcular();" id="cuatro" name="cuatro" disabled>
            </div>
          </td>
          <td>
            <div class="form-group col-md-2">
              <input type="number" style="width:60px; height:30px;" value="0"  min="0" pattern="^[0-9]+" class="form" onchange="javascript:calcular();" id="cinco" name="cinco" disabled>
            </div>
          </td>
          <td>
            <div class="form-group col-md-2">
              <input type="number" style="width:60px; height:30px;" value="0"  min="0" pattern="^[0-9]+" class="form" onchange="javascript:calcular();" id="seis" name="seis" disabled>
            </div>
          </td>
          <td>
          <div class="form-group col-md-2">
              <input type="text" style="width:60px; height:30px;" value="0" class="form" id="resultado" name="resultado" readonly="true" disabled>
          </div>
          </td>
        </tr>
      </tbody>
    </table>
    <br>
    <h5 class="letra">Raciones por día del servicio</h5>
      <table class="table table-bordered" style="background-color:grey;" onclick="javascript:bloquear();" id="tablatres">
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
            <input class="form-check-input" type="checkbox" id="gridCheck1" disabled>&nbsp;
          </div></td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1" disabled>
          </div></td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1" disabled>
          </div></td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1" disabled>
          </div></td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1" disabled>
          </div></td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1" disabled>
          </div></td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1" disabled>
          </div></td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1" disabled>
          </div></td>
        </tr>
        <tr>
          <td>Almuerzo</td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1" disabled>&nbsp;
          </div></td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1" disabled>
          </div></td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1" disabled>
          </div></td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1" disabled>
          </div></td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1" disabled>
          </div></td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1" disabled> 
          </div></td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1" disabled>
          </div></td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1" disabled>
          </div></td>
        </tr>
        <tr>
          <td>Merienda</td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1" disabled>&nbsp;
          </div></td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1" disabled>
          </div></td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1" disabled>
          </div></td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1" disabled>
          </div></td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1" disabled>
          </div></td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1" disabled>
          </div></td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1" disabled>
          </div></td>
          <td class='center-item' ><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1" disabled>
          </div></td>
        </tr>
        <tr>
          <td>Cena</td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1" disabled>&nbsp;
          </div></td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1" disabled>
          </div></td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1" disabled>
          </div></td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1" disabled>
          </div></td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1" disabled>
          </div></td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1" disabled>
          </div></td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1" disabled>
          </div></td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1" disabled>
          </div></td>
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
              <input class="form-check-input" onclick="javascript:bloquear();" type="radio" name="gridRadios" id="gridRadios1" value="option1" required disabled>
              <label class="form-check-label" for="gridRadios1">
                Publica
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" onclick="javascript:bloquear();" type="radio" name="gridRadios" id="gridRadios2" value="option2" required disabled>
              <label class="form-check-label" for="gridRadios2">
                Privada
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" onclick="javascript:bloquear();" type="radio" name="gridRadios" id="gridRadios2" value="option2" required disabled>
              <label class="form-check-label" for="gridRadios2">
                No recibo ayuda
              </label>
            </div>
          </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-2 letra" onclick="javascript:bloquear();">*¿Recibe ayuda financiera?</div>
        <div class="col-sm-10">
        <br>
        <br>
        <div class="col-sm-10">
            <div class="form-check">
              <input class="form-check-input" onclick="javascript:bloquear();" type="radio" name="financiera" id="financiera" value="option1" required disabled>
              <label class="form-check-label" for="gridRadios1">
                Publica
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" onclick="javascript:bloquear();" type="radio" name="financiera" id="financiera" value="option2" required disabled>
              <label class="form-check-label" for="gridRadios2">
                Privada
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" onclick="javascript:bloquear();" type="radio" name="financiera" id="financiera" value="option2" required disabled >
              <label class="form-check-label" for="gridRadios2">
                No recibo ayuda
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