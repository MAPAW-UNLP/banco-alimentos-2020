<link rel="stylesheet" href="{{ url('css/lateral-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/add-user.css') }}">
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script type="text/javascript">
@if(Session::has('success'))
    $(document).ready(function() {
        setTimeout(function() {
            $(".content2").fadeIn(1500);fadeIn
        },1000);
    
        setTimeout(function() {
            $(".content2").fadeOut(1500);
        },6000);
    });
@endif;
//Form Validations
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if(form.name.value.length < 3 || form.name.value.length > 20){
            event.preventDefault();
            event.stopPropagation();
            form.name.classList.add('is-invalid')
        }
        if(form.apellido.value.length < 2 || form.apellido.value.length > 20){
            event.preventDefault();
            event.stopPropagation();
            form.name.classList.add('is-invalid')
        }
        /*var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        if(form.email.value.match(mailformat)){
            event.preventDefault();
            event.stopPropagation();
            form.email.classList.add('is-invalid')
        }*/

        var numberformat = /^[0-9]*$/;
        if (!numberformat.test(form.telefono.value)) {
            event.preventDefault();
            event.stopPropagation();
            form.telefono.classList.add('is-invalid')
         }

         if (!numberformat.test(form.dni.value)) {
            event.preventDefault();
            event.stopPropagation();
            form.dni.classList.add('is-invalid')
         }

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
<div class="content2" style="display:none;">"{{ Session::get('success') }}"</div>
<div class='general-container'>
<div class='lateral-menu'>
        @can('role-create')
        <div>
            <a href="{{ url('/addUser') }}" class='lateral-menu-item-color' title="Agregar usuario">
                <p class='lateral-menu-text-item'><b>Agregar usuario</b></p>
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
            <a href="{{ url('/solicitudes') }}" class='lateral-menu-item' title="Gestión de área social">           
                <p class='lateral-menu-text-item'>Gestion área social</p>
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
    <div class='body'>
        <div class='add-user-body'>
            <h3>Agregar Usuario</h3>
            <form action="{{url('/users')}}" method="post" class="needs-validation" novalidate name='form'>
            {{method_field('POST')}}
            {{csrf_field()}}
                <div>
                    <div class="form-group row">                       
                        <label class="col-sm-3 col-form-label" title="Nombre de usuario">Nombre*</label>
                        <div class="col-sm-7">
                            <input pattern="[A-Za-z]{3,20}" class="form-control" id="validationCustom01" type="text" name="name" placeholder="Juan Carlos" required title="Nombre de usuario">
                            <div class="font-white invalid-feedback">
                                Ingrese al menos 3 letras
                            </div>
                        </div>
                    </div>
                    <div class="form-group row"> 
                        <label class="col-sm-3 col-form-label" title="Email del usuario">Apellido*</label>
                        <div class="col-sm-7">
                            <input pattern="[A-Za-z]{3,20}" class="form-control" type="text" id="validationCustom02"  name ="apellido" placeholder="García" required title="Apellido del usuario">
                            <div class="font-white invalid-feedback">
                                Ingrese al menos 3 letras
                            </div>
                        </div>
                    </div>
                    <div class="form-group row"> 
                        <label class="col-sm-3 col-form-label" title="Email del usuario">Email*</label>
                        <div class="col-sm-7">
                            <input pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" type="email" id="validationCustom03" name ="email" placeholder="mail@mail.com" required title="Email del usuario">
                            <div class="font-white invalid-feedback">
                                Complete este campo ejemplo: juanperez@dominio.com
                            </div>
                        </div>
                    </div>
                    <div class="form-group row"> 
                        <label class="col-sm-3 col-form-label" title="Dni del usuario">DNI*</label>
                        <div class="col-sm-7">
                            <input minlength="8" maxlength="8"  class="form-control" type="text" id="validationCustom04" name="dni" placeholder="14589657" required title="Dni del usuario">
                            <div class="font-white invalid-feedback">
                                Complete este campo con 8 números
                            </div>
                        </div>
                    </div>
                    <div class="form-group row"> 
                        <label type='text' class="col-sm-3 col-form-label" title="Teléfono del usuario" name='telefono'>Teléfono*</label>
                        <div class="col-sm-7">
                            <input class="form-control" type="text" id="validationCustom05" name="telefono" placeholder="221 578 9696 " required title="Teléfono del usuario">
                            <div class="font-white invalid-feedback">
                                Complete este campo solo con números
                            </div>
                        </div>
                    </div>
                    <div class="form-group row"> 
                        <label class="col-sm-3 col-form-label" title="Rol del usuario">Seleccione un rol</label>
                        <div class="col-sm-7">
                            <select class="custom-select" required id="rol_id" name="rol_id" title="Rol del usuario">                            
                                <option value='1'>Empleado</option>
                                <option value='2'>Organizacion</option>
                                <option value='3'>Administrador</option>
                            </select>
                        </div>
                    </div>
                    <div class='buttons-section'>
                        <button type="reset" class='cancel' title="Cancelar registro">Cancelar</button>
                        <button type="submit" class='accept' title="Aceptar registro">Aceptar</button>                        
                    </div>  
                </div>                                                                       
            </form>
        </div>
    </div>
</div>