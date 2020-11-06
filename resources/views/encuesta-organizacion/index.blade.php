<link rel="stylesheet" href="{{ url('css/encuesta-organizacion.css') }}">
<script>

    //Datepicker curren
    $("#datepicker").datepicker("setDate", new Date());
    $('#datepicker').datepicker({
        "setDate": new Date(),
        "autoclose": true
    });
</script>
<div class='body'>
    <h2 class='title'>Encuesta para visitas a instituciones</h2>
    <form>
        <div class="encabezado">
            <div class="form-inline">
                <label class="my-2 mr-2" for="validationServer01">Nombre de la institución: </label>
                <input class="my-4 mr-2" type="text" class="form-control is-invalid" id="validationServer01" placeholder="Caritas" required>
                <div class="invalid-feedback">
                    Ingrese una dirección
                </div>
            </div>
            <div class="form-inline">
                <label class="my-2 mr-2" for="example-date-input" class="col-2 col-form-label">Fecha de la visita: </label>
                <input class="form-control" type="date" id="datepicker" required>
                <label class="my-2 ml-4 mr-2" for="validationServer02">Persona entrevistada: </label>
                <input class="my-4 mr-2" type="text" class="form-control is-invalid" id="validationServer02" placeholder="Juan Carlos" required>            
            </div>
            <div class="form-inline">
                <label class="my-2 mr-2" for="validationServer03">Entrevistador/a: </label>
                <input class="my-4 mr-2" type="text" class="form-control is-invalid" id="validationServer03" placeholder="Dolores" required>
            </div>
        </div>
        <h4>Parte 1: Información general de la institución</h4>
        <div class="form-row">
            <div class="col-md-4 mb-3">
                <label for="validationServer04">1) Calle</label>
                <input type="text" class="form-control is-invalid" id="validationServer04" placeholder="45" required>
                <div class="invalid-feedback">
                    Ingrese una dirección
                </div>
            </div>
          <div class="col-md-4 mb-3">
            <label for="validationServer05">Entre calles </label>
            <input type="text" class="form-control" id="validationServer05" placeholder="27 y 28" required>
          </div>
          <div class="col-md-4 mb-3">
            <label for="validationServer06">Número </label>
            <input type="text" class="form-control" id="validationServer06" placeholder="1500" required>
          </div>
        </div>
        <div class="form-inline">
            <label class="my-2 mr-2" for="validationServer07">2) Barrio </label>
            <input type="text" class="form-control" id="validationServer07" placeholder="La Loma" required>
        </div>
        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label for="validationServer03">City</label>
            <input type="text" class="form-control is-invalid" id="validationServer03" placeholder="City" required>
            <div class="invalid-feedback">
              Please provide a valid city.
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="validationServer04">State</label>
            <input type="text" class="form-control is-invalid" id="validationServer04" placeholder="State" required>
            <div class="invalid-feedback">
              Please provide a valid state.
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <label for="validationServer05">Zip</label>
            <input type="text" class="form-control is-invalid" id="validationServer05" placeholder="Zip" required>
            <div class="invalid-feedback">
              Please provide a valid zip.
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input is-invalid" type="checkbox" value="" id="invalidCheck3" required>
            <label class="form-check-label" for="invalidCheck3">
              Agree to terms and conditions
            </label>
            <div class="invalid-feedback">
              You must agree before submitting.
            </div>
          </div>
        </div>
        <button class="btn btn-primary" type="submit">Submit form</button>
    </form>
</div>