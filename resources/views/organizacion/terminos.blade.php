@include('main')
@include('components.header')
@include('components.nav')

<link rel="stylesheet" href="{{ url('css/lateral-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/top-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/terminos.css') }}">
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />

<script>
    function check_terminos(){
        console.log('Holi')
        if(document.getElementById("terminos").checked == false){
            event.preventDefault();
            alert('Debe aceptar los terminos y condiciones para continuar');
        }
    }
    function autocheck(){
        document.getElementById("terminus").checked = true;
        document.getElementById("terminos").checked = true;
    }
</script>
<br>
<div class='body-terminos'>
    <div class='body-request'>
        <h3 aling="center" title="Solicitud de ingreso">Solicitud de ingreso</h3>
        <h6 id="termino" name="termino" onclick="javascript:autocheck();" title="IMPORTANTE: DECLARO QUE LOS DATOS INGRESADOS A CONTINUACIÓN CONSTITUYEN INFORMACIÓN VERDADERA Y COMPLETA, Y TIENEN CARÁCTER DE DECLARACIÓN JURADA">
             IMPORTANTE: DECLARO QUE LOS DATOS INGRESADOS A
            CONTINUACIÓN CONSTITUYEN INFORMACIÓN VERDADERA Y COMPLETA, Y TIENEN CARÁCTER DE DECLARACIÓN JURADA
        </h6>
        <div>
        <input id="terminos" name="terminos" type="checkbox" title="Seleccionar"> <b name="terminus" id="terminus" onclick="javascript:autocheck();" title="HE LEIDO Y ACEPTO LOS TERMINOS Y CONDICIONES">HE LEIDO Y ACEPTO LOS TERMINOS Y CONDICIONES</b>
        </div>
        <div class='request-section'>
            <form id="myForm" action="{{ url('/registro')}}" method="GET">
                <button type="submit" class="btn" onclick="javascript:check_terminos();" title="Continuar" style="background-color: #103965; color:#ffffff">
                    Continuar
                </button>
            </form>
        </div>
    </div>
</div>
<br>
@include('components.footer')
