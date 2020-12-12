<link rel="stylesheet" href="{{ url('css/lateral-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/top-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/regitroOrganizacion.css') }}">
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />



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
  var personeria = document.form.personeria.value;
  if (personeria == '0'){
    document.form.municipio.disabled=false;
    document.form.movimiento.disabled = false;
    document.form.otro.disabled = false;
  }
  if (personeria == '1'){
    document.form.municipio.disabled=true;
    document.form.movimiento.disabled = true;
    document.form.otro.disabled = true;
  }

  //document.getElementsByName("total_servicio")[0].value = parseInt(uno) + parseInt(dos) + parseInt(tres) + parseInt(cuatro) + parseInt(cinco);
}

function valor(){
  alert(document.form.cena_desde.value);
}
</script>

@include('main')
@include('components.header')
@include('components.nav')

<div class='body-registro'>
  <div class='body-request'>
    <h3 class="letra"> Solicitud de ingreso </h3>
    <form action="{{ url('/registro')}}" method='post' class="was-validated" name="form">
      {{csrf_field()}}
      <div class="form-group row">
        <label for="nombre_institucion" class="col-sm-3 col-form-label letra" title="Nombre institución">*Nombre de la institución:</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" id="nombre_institucion" name="nombre_institucion" title="Nombre institución" placeholder="Nombre institución" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="validationServer03" class="col-sm-3 col-form-label letra" title="Nombre referente">*Nombre del referente:</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" id="referente" name="nombre_referente" title="Nombre referente" placeholder="Nombre referente" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="validationServer03" class="col-sm-3 col-form-label letra" title="Email">*Email inicio sesión:</label>
        <div class="col-sm-4">
          <input type="email" class="form-control" id="referente" name="referente" title="Email" placeholder="mail@mail"  required>
        </div>
      </div>
      <div class="form-group row">
        <label for="validationServer03" class="col-sm-3 col-form-label letra" title="Teléfono / Celular">*Teléfono / Celular</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" id="inputPassword3" name="telefono" title="Teléfono/Celular" placeholder="Teléfono/Celular" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="validationServer03" class="col-sm-3 col-form-label letra" title="Domicilio (barrio)">*Domicilio (barrio):</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" id="inputPassword3" name="barrio" title="Domicilio" placeholder="Domicilio" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="validationServer03" class="col-sm-3 col-form-label letra" title="Localidad">*Localidad:</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" id="inputPassword3" name="localidad" title="Localidad" placeholder="Localidad" required>
        </div>
      </div>

      <fieldset class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-2 pt-0 letra" title="Personería jurídica">*¿Personería jurídica?</legend>
          <div class="col-sm-10">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="personeria" title="Si" id="gridRadios1" onclick="javascript:desbloquear();" value=1 required>
                <label class="form-check-label" for="gridRadios1" title="Si">
                    <b>Si</b>
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="personeria" id="gridRadios2" title="No" onclick="javascript:desbloquear();" value=0 required>
                <label class="form-check-label" for="gridRadios2" title="No">
                    <b>No</b>
                </label>
            </div>
          </div>
        </div>
      </fieldset>
      <div class="form-group row">
        <div class="col-sm-2 letra" title="En caso negativo, ¿tiene algún aval?">* En caso negativo, ¿tiene algún aval?</div>
        <div class="col-sm-10">
        <br>
        <br>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1" name="municipio" id="municipio" title="Municipio" value=1 disabled="true">
            <label class="form-check-label" for="gridCheck1" title="Municipio">
                <b>Municipio</b>
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1" name="movimiento" id="movimiento" title="Movimiento social"  value=4 disabled="true">
            <label class="form-check-label" for="gridCheck1" title="Movimiento social">
                <b>Movimiento social</b>
            </label>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-1 col-form-label" title="Otro">*Otro:</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" id="nombre_institucion" title="Otro" name="otro" id="otro" disabled="true">
            </div>
          </div>
        </div>
      </div>
      <h3 class="letra" title="Tipos de servicio por día:">* Tipos de servicio por día:</h3>
      <h5 class="letra" title="¿A qué cantidad de personas se les brinda el servicio?">¿A qué cantidad de personas se les brinda el servicio?</h5>
      <table class="table table-bordered" style="background-color:grey;" name="cantPersonas">
      <thead>
        <tr>
          <th class='center-item' scope="col" title="Desayuno">Desayuno</th>
          <th class='center-item' scope="col" title="Almuerzo">Almuerzo</th>
          <th class='center-item' scope="col" title="Merienda">Merienda</th>
          <th class='center-item' scope="col" title="Cena">Cena</th>
          <th class='center-item' scope="col" title="Bolsón">Bolsón</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class='center-item'>
            <div class="form-group col-md-2">
              <input type="number" style="width:60px; height:30px;" value="0" class="form" min="0" pattern="^[0-9]+" id="desayuno" name="desayuno">
            </div>
          </td>
          <td class='center-item'>
            <div class="form-group col-md-2">
              <input type="number" style="width:60px; height:30px;" value="0" class="form"  min="0" pattern="^[0-9]+" id="almuerzo" name="almuerzo">
            </div>
          </td>
          <td class='center-item'>
            <div class="form-group col-md-2">
              <input type="number" style="width:60px; height:30px;" value="0" class="form"  min="0" pattern="^[0-9]+" id="merienda" name="merienda">
            </div>
          </td>
          <td class='center-item'>
            <div class="form-group col-md-2">
              <input type="number" style="width:60px; height:30px;" value="0" class="form"  min="0" pattern="^[0-9]+" id="cena" name="cena">
            </div>
          </td>
          <td class='center-item'>
            <div class="form-group col-md-2">
              <input type="number" style="width:60px; height:30px;" value="0" class="form"  min="0" pattern="^[0-9]+" id="bolson" name="bolson">
            </div>
          </td>
        </tr>
      </tbody>
    </table>
    <br>
    <h5 class="letra">Edad de los beneficiarios</h5>
      <table class="table table-bordered" style="background-color:grey;" name="edadPersonas">
      <thead>
        <tr>
          <th class='center-item' scope="col" title="0-2 años">0-2</th>
          <th class='center-item' scope="col" title="3-5 años">3-5</th>
          <th class='center-item' scope="col" title="6-12 años">6-12</th>
          <th class='center-item' scope="col" title="13-18 años">13-18</th>
          <th class='center-item' scope="col" title="19-65 años">19-65</th>
          <th class='center-item' scope="col" title="Mayor a 65 años">+65</th>
          <th class='center-item' scope="col" title="Total">Total</th>
        </tr>
      </thead>
      <tbody>
      <tr>
          <td>
            <div class="form-group col-md-2">
              <input type="number" style="width:60px; height:30px;" value="0"  min="0" pattern="^[0-9]+" class="form" onchange="javascript:calcular();" id="uno" name="uno">
            </div>
          </td>
          <td>
            <div class="form-group col-md-2">
              <input type="number" style="width:60px; height:30px;" value="0"  min="0" pattern="^[0-9]+" class="form" onchange="javascript:calcular();" id="dos" name="dos">
            </div>
          </td>
          <td>
            <div class="form-group col-md-2">
              <input type="number" style="width:60px; height:30px;" value="0"  min="0" pattern="^[0-9]+" class="form" onchange="javascript:calcular();" id="tres" name="tres">
            </div>
          </td>
          <td>
            <div class="form-group col-md-2">
              <input type="number" style="width:60px; height:30px;" value="0"  min="0" pattern="^[0-9]+" class="form" onchange="javascript:calcular();" id="cuatro" name="cuatro">
            </div>
          </td>
          <td>
            <div class="form-group col-md-2">
              <input type="number" style="width:60px; height:30px;" value="0"  min="0" pattern="^[0-9]+" class="form" onchange="javascript:calcular();" id="cinco" name="cinco">
            </div>
          </td>
          <td>
            <div class="form-group col-md-2">
              <input type="number" style="width:60px; height:30px;" value="0"  min="0" pattern="^[0-9]+" class="form" onchange="javascript:calcular();" id="seis" name="seis">
            </div>
          </td>
          <td>
          <div class="form-group col-md-2">
              <input type="text" style="width:60px; height:30px;" value="0" class="form" id="resultado" name="resultado" readonly="true">
          </div>
          </td>
        </tr>
      </tbody>
    </table>
    <br>
    <h5 class="letra">Raciones por día del servicio</h5>
      <table class="table table-bordered" style="background-color:grey; margin-bottom:0rem;" name="raciones" >
      <thead>
        <tr>
          <th class='center-item' scope="col"></th>
          <th class='center-item' scope="col" title="Lunes">Lunes</th>
          <th class='center-item' scope="col" title="Martes">Martes</th>
          <th class='center-item' scope="col" title="Miercoles">Miercoles</th>
          <th class='center-item' scope="col" title="Jueves">Jueves</th>
          <th class='center-item' scope="col" title="Viernes">Viernes</th>
          <th class='center-item' scope="col" title="Sabado">Sabado</th>
          <th class='center-item' scope="col" title="Domingo">Domingo</th>
          <th class='center-item' scope="col" title="Franja horaria">Franja horaria</th>
        </tr>
      </thead>
      <tbody>
      <tr>
          <td title="Desayuno">Desayuno</td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="DL" name="DL" value=1 title="Seleccionar">&nbsp;
          </div></td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="DMA" name="DMA" value=1 title="Seleccionar">
          </div></td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="DMI" name="DMI" value=1 title="Seleccionar">
          </div></td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="DJ" name="DJ" value=1 title="Seleccionar">
          </div></td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="DV" name="DV" value=1 title="Seleccionar">
          </div></td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="DS" name="DS" value=1 title="Seleccionar">
          </div></td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="DD" name="DD" value=1 title="Seleccionar">
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
                  <input class="form-check-input" type="time" id="desayuno_desde" name="desayuno_desde" value=1>DESDE
                </td>
                <td class='center-item'>
                  <input class="form-check-input" type="time" id="desayuno_hasta" name="desayuno_hasta" value=1>HASTA
                </td>
              </tr>
              </tbody>
            </table>
         </td>
        </tr>
        <tr>
          <td title="Almuerzo">Almuerzo</td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="AL" name="AL" value=1 title="Seleccionar">&nbsp;
          </div></td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="AMA" name="AMA" value=1 title="Seleccionar">
          </div></td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="AMI" name="AMI" value=1 title="Seleccionar">
          </div></td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="AJ" name="AJ" value=1 title="Seleccionar">
          </div></td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="AV" name="AV" value=1 title="Seleccionar">
          </div></td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="AS" name="AS" value=1 title="Seleccionar">
          </div></td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="AD" name="AD" value=1 title="Seleccionar">
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
                  <input class="form-check-input" type="time" id="almuerzo_desde" name="almuerzo_desde" value=1>DESDE
                </td>
                <td class='center-item'>
                  <input class="form-check-input" type="time" id="almuerzo_hasta" name="almuerzo_hasta" value=1>HASTA
                </td>
              </tr>
              </tbody>
            </table>
         </td>
        </tr>
        <tr>
          <td title="Merienda">Merienda</td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="ML" name="ML" value=1 title="Seleccionar">&nbsp;
          </div></td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="MMA" name="MMA" value=1 title="Seleccionar">
          </div></td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="MMI" name="MMI" value=1 title="Seleccionar">
          </div></td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="MJ" name="MJ" value=1 title="Seleccionar">
          </div></td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="MV" name="MV" value=1 title="Seleccionar">
          </div></td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="MS" name="MS" value=1 title="Seleccionar">
          </div></td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="MD" name="MD" value=1 title="Seleccionar">
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
                  <input class="form-check-input" type="time" id="merienda_desde" name="merienda_desde" value=1>DESDE
                </td>
                <td class='center-item'>
                  <input class="form-check-input" type="time" id="merienda_hasta" name="merienda_hasta" value=1>HASTA
                </td>
              </tr>
              </tbody>
            </table>
         </td>
        </tr>
        <tr>
          <td title="Cena">Cena</td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="CL" name="CL" value=1 title="Seleccionar">&nbsp;
          </div></td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="CMA" name="CMA" value=1 title="Seleccionar">
          </div></td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="CMI" name="CMI" value=1 title="Seleccionar">
          </div></td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="CJ" name="CJ" value=1 title="Seleccionar">
          </div></td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="CV" name="CV" value=1 title="Seleccionar">
          </div></td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="CS" name="CS" value=1 title="Seleccionar">
          </div></td>
          <td class='center-item'><div class="form-check">
            <input class="form-check-input" type="checkbox" id="CD" name="CD" value=1 title="Seleccionar">
          </div></td>
          <td class='center-item'>
            <table class="table table-bordered" style="background-color:grey;" name="cantPersonas">
              <thead>
                <th class='center-item' scope="col" title="Desde">Desde</th>
                <th class='center-item' scope="col" title="Hasta">Hasta</th>
              </thead>
              <tbody>
              <tr>
                <td class='center-item'>
                  <input class="form-check-input" type="time" id="cena_desde" name="cena_desde" value=1 >DESDE
                </td>
                <td class='center-item'>
                  <input class="form-check-input" type="time" id="cena_hasta" name="cena_hasta" value=1>HASTA
                </td>
              </tr>
              </tbody>
            </table>
         </td>
        </tr>
      </tbody>
    </table>
    <div class="form-group row">
        <div class="col-sm-2 letra" title="En caso negativo, ¿tiene algún aval?">* En caso negativo, ¿tiene algún aval?</div>
        <div class="col-sm-10">
        <br>
        <br>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1" name="municipio" id="municipio" title="Municipio" value=1>
            <label class="form-check-label" for="gridCheck1" title="Municipio">
                <b>Pública</b>
            </label>
            <input type="text" class="form-control" id="nombre_institucion" title="Otro" name="otro" id="otro" disabled="true">
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1" name="movimiento" id="movimiento" title="Movimiento social"  value=4 >
            <label class="form-check-label" for="gridCheck1" title="Movimiento social">
                <b>Privada</b>
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1" name="movimiento" id="movimiento" title="Movimiento social"  value=4>
            <label class="form-check-label" for="gridCheck1" title="Movimiento social">
                <b>No recibo ayuda</b>
            </label>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-1 col-form-label" title="Otro">*Otro:</label>
            <div class="col-sm-5">
              <input type="text" class="form-control" id="nombre_institucion" title="Otro" name="otro" id="otro" disabled="true">
            </div>
          </div>
        </div>
      </div>
    <div class="form-group row">
        <div class="col-sm-2 letra" title="¿Tiene ayuda alimentaria?">*¿Tiene ayuda alimentaria?</div>
        <div class="col-sm-10">
        <br>
        <br>
        <div class="col-sm-10">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="alimentaria" id="gridRadios1" value=1 required>
              <label class="form-check-label" for="gridRadios3">
                <b title="Publica">Pública</b>
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="alimentaria" id="gridRadios2" value=2 required>
              <label class="form-check-label" for="gridRadios4">
                <b title="Privada">Privada</b>
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="alimentaria" id="gridRadios2" value=3 required>
              <label class="form-check-label" for="gridRadios5">
                <b title="No recibo ayuda">No recibo ayuda</b>
              </label>
            </div>
          </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-2 letra" title="¿Recibe ayuda financiera?">*¿Recibe ayuda financiera?</div>
        <div class="col-sm-10">
        <br>
        <br>
        <div class="col-sm-10">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="financiera" id="financiera" value=1 required>
              <label class="form-check-label" for="gridRadios6">
                <b title="Publica">Pública</b>
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="financiera" id="financiera" value=2 required>
              <label class="form-check-label" for="gridRadios7">
                <b title="Privada">Privada</b>
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="financiera" id="financiera" value=3 required>
              <label class="form-check-label" for="gridRadios8">
                <b title="No recibo ayuda">No recibo ayuda</b>
              </label>
            </div>
          </div>
        </div>
    </div>
    <div class="mb-3">
        <label for="validationTextarea" class="letra" title="Breve párrafo explicativo de la tarea que realizan">*Breve párrafo explicativo de la tarea que realizan</label>
        <textarea class="form-control is-invalid" id="validationTextarea" placeholder="Agregue una explicación" title="Agregue una explicación" required></textarea>
        <div class="invalid-feedback">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-12 text-right">
          <button type="submit" class="btn" style="background-color: #103965; color:#ffffff">Enviar</button>
        </div>
      </div>
    </form>
    </div>
</div>

@include('components.footer')
