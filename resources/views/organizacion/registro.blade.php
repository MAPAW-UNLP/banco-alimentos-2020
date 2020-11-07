@include('main')
@include('components.header')
@include('components.nav')

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


</script>

<div class='body-registro'>
  <div class='body-request'>
    <h3 class="letra"> Solicitud de ingreso </h3>
    <form class="was-validated">
      <div class="form-group row">
        <label for="validationServer03" class="col-sm col-form-label letra">*Nombre de la institución:</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="nombre_institucion" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="validationServer03" class="col-sm col-form-label letra">*Nombre del referente:</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="referente" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="validationServer03" class="col-sm col-form-label letra">*Teléfono / Celular</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="inputPassword3" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="validationServer03" class="col-sm col-form-label letra">*Domicilio (barrio):</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="inputPassword3" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="validationServer03" class="col-sm col-form-label letra">*Localidad:</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" id="inputPassword3" required>
        </div>
      </div>

      <fieldset class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-2 pt-0 letra">*¿Personería jurídica?</legend>
          <div class="col-sm-10">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" required>
              <label class="form-check-label" for="gridRadios1">
                Si
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2" required>
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
            <input class="form-check-input" type="checkbox" id="gridCheck1">
            <label class="form-check-label" for="gridCheck1">
              ONG
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1">
            <label class="form-check-label" for="gridCheck1">
              Estado ¿cuál?
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1">
            <label class="form-check-label" for="gridCheck1">
              Movimiento social
            </label>
          </div>
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">*Otro:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nombre_institucion" required>
            </div>
          </div>
        </div>
      </div>
      <h3 class="letra">* Tipos de servicio por día:</h3>
      <h5 class="letra">¿A qué cantidad de personas se les brinda el servicio?</h5>
      <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">Desayuno</th>
          <th scope="col">Almuerzo</th>
          <th scope="col">Merienda</th>
          <th scope="col">Cena</th>
          <th scope="col">Bolsón</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1">&nbsp;
          </div></td>
          <td><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1">
          </div></td>
          <td><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1">
          </div></td>
          <td><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1">
          </div></td>
          <td><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1">
          </div></td>
        </tr>
      </tbody>
    </table>
    <br>
    <h5 class="letra">Edad de los beneficiarios</h5>
      <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">0-2</th>
          <th scope="col">3-5</th>
          <th scope="col">6-12</th>
          <th scope="col">13-18</th>
          <th scope="col">19-65</th>
          <th scope="col">+65</th>
          <th scope="col">Total</th>
        </tr>
      </thead>
      <tbody>
      <tr>
          <td>
            <div class="form-group col-md-2">
              <input type="number" style="width:60px; height:30px;" value="0" class="form" onchange="javascript:calcular();" id="uno" name="uno">
            </div>
          </td>
          <td>
            <div class="form-group col-md-2">
              <input type="number" style="width:60px; height:30px;" value="0" class="form" onchange="javascript:calcular();" id="dos" name="dos">
            </div>
          </td>
          <td>
            <div class="form-group col-md-2">
              <input type="number" style="width:60px; height:30px;" value="0" class="form" onchange="javascript:calcular();" id="tres" name="tres">
            </div>
          </td>
          <td>
            <div class="form-group col-md-2">
              <input type="number" style="width:60px; height:30px;" value="0" class="form" onchange="javascript:calcular();" id="cuatro" name="cuatro">
            </div>
          </td>
          <td>
            <div class="form-group col-md-2">
              <input type="number" style="width:60px; height:30px;" value="0" class="form" onchange="javascript:calcular();" id="cinco" name="cinco">
            </div>
          </td>
          <td>
            <div class="form-group col-md-2">
              <input type="number" style="width:60px; height:30px;" value="0" class="form" onchange="javascript:calcular();" id="seis" name="seis">
            </div>
          </td>
          <td>
          <div class="form-group col-md-2">
              <input type="number" style="width:60px; height:30px;" value="0" class="form" onchange="javascript:calcular();" id="resultado" name="resultado">
          </div>
          </td>
        </tr>
      </tbody>
    </table>
    <br>
    <h5 class="letra">Raciones por día del servicio</h5>
      <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col"></th>
          <th scope="col">Lunes</th>
          <th scope="col">Martes</th>
          <th scope="col">Miercoles</th>
          <th scope="col">Jueves</th>
          <th scope="col">Viernes</th>
          <th scope="col">Sabado</th>
          <th scope="col">Domingo</th>
          <th scope="col">Franja horaria</th>
        </tr>
      </thead>
      <tbody>
      <tr>
          <td>Desayuno</td>
          <td><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1">&nbsp;
          </div></td>
          <td><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1">
          </div></td>
          <td><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1">
          </div></td>
          <td><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1">
          </div></td>
          <td><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1">
          </div></td>
          <td><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1">
          </div></td>
          <td><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1">
          </div></td>
          <td><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1">
          </div></td>
        </tr>
        <tr>
          <td>Almuerzo</td>
          <td><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1">&nbsp;
          </div></td>
          <td><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1">
          </div></td>
          <td><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1">
          </div></td>
          <td><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1">
          </div></td>
          <td><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1">
          </div></td>
          <td><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1">
          </div></td>
          <td><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1">
          </div></td>
          <td><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1">
          </div></td>
        </tr>
        <tr>
          <td>Merienda</td>
          <td><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1">&nbsp;
          </div></td>
          <td><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1">
          </div></td>
          <td><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1">
          </div></td>
          <td><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1">
          </div></td>
          <td><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1">
          </div></td>
          <td><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1">
          </div></td>
          <td><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1">
          </div></td>
          <td><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1">
          </div></td>
        </tr>
        <tr>
          <td>Cena</td>
          <td><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1">&nbsp;
          </div></td>
          <td><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1">
          </div></td>
          <td><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1">
          </div></td>
          <td><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1">
          </div></td>
          <td><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1">
          </div></td>
          <td><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1">
          </div></td>
          <td><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1">
          </div></td>
          <td><div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1">
          </div></td>
        </tr>
      </tbody>
    </table>
    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label letra">*Cantidad de personas:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="nombre_institucion" required>
        </div>
    </div> 
    <div class=" form-inline">
    <label class="my-1 mr-2 letra" for="inlineFormCustomSelectPref">*Edad por rango:</label>
      <select class="custom-select is-invalid" id="validationServer04" aria-describedby="validationServer04Feedback" required>
        <option value="">Edad por rango</option>
        <option value="">10-20</option>
      </select>
    </div>
    <br>
    <div class="form-group row">
        <div class="col-sm-2 letra">*¿Tiene ayuda alimentaria?</div>
        <div class="col-sm-10">
        <br>
        <br>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1">
            <label class="form-check-label" for="gridCheck1">
              ONG
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1">
            <label class="form-check-label" for="gridCheck1">
              Estado ¿cuál?
            </label>
          </div>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-2 letra">*¿Recibe ayuda financiera?</div>
        <div class="col-sm-10">
        <br>
        <br>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1">
            <label class="form-check-label" for="gridCheck1">
              ONG
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck1">
            <label class="form-check-label" for="gridCheck1">
              Estado ¿cuál?
            </label>
          </div>
        </div>
    </div>
    <div class="mb-3">
        <label for="validationTextarea" class="letra">*Breve párrafo explicativo de la tarea que realizan</label>
        <textarea class="form-control is-invalid" id="validationTextarea" placeholder="Agregue una explicación" required></textarea>
        <div class="invalid-feedback">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
      </div>
    </form>
    </div>
</div>