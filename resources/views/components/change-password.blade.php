<link rel="stylesheet" href="{{ url('css/lateral-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/change-password.css') }}">

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
        <div class='add-user-body'>
            <h3>Cambiar contraseña</h3>
            <form action="{{ url('/changePassword') }}" method="POST">
            {{method_field('Post')}}
            {{csrf_field()}}
                <div class='input-section'>
                    <div class='form-item'>
                        <label>Ingresar contraseña actual *</label>
                        <input type="passsword" id="password" name="password" required>
                    </div>
                    <div class='form-item'>
                        <label>Ingresar nueva contraseña *</label>
                        <input type="passsword" id="newPassword" name="newPassword" required>
                    </div>
                    <div class='form-item'>
                        <label>Repetir nueva contraseña *</label>
                        <input type="passsword" id="repeatNewPassword" name="repeatNewPassword" required>
                    </div>                    
                    <div class='buttons-section'>
                        <button type="cancel" class='cancel-button'>Cancelar</button>
                        <button type="submit" >Aceptar</button>                        
                    </div>  
                </div>                                                                    
            </form>
        </div>
    </div>
</div>