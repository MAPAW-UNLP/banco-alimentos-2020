<link rel="stylesheet" href="{{ url('css/login.css') }}">
@include('main')
@include('components.header')
@include('components.nav')
<div class="general-container">
    <div class="left-container">
        <img src="{{ asset('img/slide2_2.jpg') }}" class='img-fluid'>
    </div>
    <div class='right-container'>
        <div class="card-body">
        <h3>Recuperar contraseña</h3>
            <h6>Su solicitud ha sido procesada. Revise la bandeja de entrada de su correo.</h6>
            <br>
            <h6>Banco de alimentos</h6>
        </div>
    </div>
</div>
@include('components.footer')
