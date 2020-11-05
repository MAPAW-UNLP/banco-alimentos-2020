@include('main')
@include('components.header')
@include('components.nav')


<link rel="stylesheet" href="{{ url('css/lateral-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/top-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/terminos.css') }}">
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />

<script>
    function check_terminos(){ 
   	if(document.getElementById("terminos").checked == false){
        event.preventDefault();
        alert('Debe aceptar los terminos y condiciones para continuar')
       }
}
</script>

<br>

<div class='body-terminos'>
            <div class='body-request'>
                <h3 style="color:white" aling="center">Terminos y condiciones para la solicitud de ingreso</h3>
                <h4 style="color:white"> <input type="checkbox" name="terminos" id="terminos"> IMPORTANTE: DECLARO QUE LOS DATOS INGRESADOS A 
                CONTINUACIÓN CONSTITUYEN INFORMACIÓN VERDADERA Y COMPLETA, Y TIENEN CARÁCTER DE DECLARACIÓN JURADA</h4>
                <div class='request-section'>
                    <div class='request-section-text'>
                    </div>
                    <div class='buttons-section'>
                    <form name="formulario" id="terminos" action="{{ url('/registro') }}">
                        {{csrf_field()}}
                        <button type="submit" onclick="javascript:check_terminos();">Continuar</button>
                    </form>                  
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<br>

@include('components.footer')