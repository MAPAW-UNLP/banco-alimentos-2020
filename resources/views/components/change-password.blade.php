<link rel="stylesheet" href="{{ url('css/lateral-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/change-password.css') }}">
<link rel=”stylesheet” href=”https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
//Form Validations
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

<div class='general-container'>
<div class='lateral-menu'>
        <div>
            <a href="{{ url('/addUser') }}" class='lateral-menu-item'>
                <p class='lateral-menu-text-item'>Agregar usuario</p>
            </a>
        </div>
        <div>
            <a href="{{ url('/changePassword') }}" class='lateral-menu-item-color'>         
                <p class='lateral-menu-text-item'><b>Cambiar contraseña</b></p>
            </a>
        </div>
        <div>
            <a href="{{ url('/solicitudes') }}" class='lateral-menu-item'>           
                <p class='lateral-menu-text-item'>Gestion área social</p>
            </a>
        </div>
        <div>
            <a href="{{ url('/combos') }}" class='lateral-menu-item'>                          
                <p class='lateral-menu-text-item'>Combos</p>              
            </a>
        </div>
    </div>
    <div class='body'>
    <div id="feedback" style="display:none">
        <h4>Cambiar contraseña</h4>
    </div>
        <div class='add-user-body'>
            <h3>Cambiar contraseña</h3>
            <form action="{{ url('/changePassword') }}" method="POST" class="needs-validation">
            {{method_field('Post')}}
            {{csrf_field()}}
                <div class='input-section'>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" title='Contraseña actual'>Ingresar contraseña actual *</label>
                        <div class="col-sm-4">
                            <input type="password" class="form-control" id="validationCustom01" name="password" required>
                            <div class="font-white invalid-feedback">
                                La contraseña ingresada no corresponde a su contraseña actual
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" title='Nueva contraseña'>Ingresar nueva contraseña *</label>
                        <div class="col-sm-4">
                            <input type="password" class="form-control" id="validationCustom02" name="newPassword" required>
                            <div class="font-white invalid-feedback">
                                La nueva contraseña debe ser diferente a la actual
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label" title='Repetir nueva contraseña'>Repetir nueva contraseña *</label>
                        <div class="col-sm-4">
                            <input type="password" class="form-control" id="validationCustom03" name="repeatNewPassword" required>
                        </div>
                        <div class="font-white invalid-feedback">
                                Debe ser igual a la nueva contraseña
                            </div>
                    </div>                    
                    <div class='buttons-section'>
                        <button type="reset" class='cancel-button'>Cancelar</button>
                        <button type="submit" class='accept'>Guardar</button>                        
                    </div>  
                </div>                                                                    
            </form>
        </div>
    </div>
</div>
