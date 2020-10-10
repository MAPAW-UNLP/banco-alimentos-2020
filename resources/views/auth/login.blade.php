<link rel="stylesheet" href="{{ url('css/login.css') }}">

<div class="general-container">
    <div class="left-container">
        <img src="{{ asset('img/slide2_2.jpg') }}" class='img-fluid'>
    </div>
    <div class="right-container">
        <div class='right'>
            <h3>Iniciar sesión</h3>
            <form>
                <div class='form-styled'>
                    <input type="email" id="inputEmail" placeholder="Email">
                    <input type="password" id="inputPassword" placeholder="Contraseña">
                    <div class="recover-accept">
                        <div class="recover-pass">
                            <a href="{{ url('/recover') }}">Recuperar contraseña</a>
                        </div>
                        <div class='accept-button'>
                            <button type="submit" class="login-button">Aceptar</button>
                        </div>
                    </div>   
                </div>                                                                       
            </form>            
            <div class='register-container'>
                <h5><b>¿Usted no esta registrado?</b></h5>
                <a class="register-button">Registrarse</a>                
            </div>
        </div>
    </div>    
</div>