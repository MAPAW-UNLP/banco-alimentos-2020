<link rel="stylesheet" href="{{ url('css/lateral-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/add-user.css') }}">

<div class='general-container'>
    <div class='lateral-menu'>
        <div class='lateral-menu-item-color'>
            <a href="{{ url('/addUser') }}">
                <p class='lateral-menu-text-item'><b>Agregar usuario</b></p>
            </a>
        </div>
        <div class='lateral-menu-item'>
            <a href="{{ url('/changePassword') }}">
                <p class='lateral-menu-text-item'>Cambiar contraseña</p>
            </a>
        </div>
        <div class='lateral-menu-item'>
            <a href="{{ url('/changePassword') }}">
                <p class='lateral-menu-text-item'>Gestion área social</p>
            </a>
        </div>
        <div class='lateral-menu-item'>
            <a href="{{ url('/combos') }}">
                <p class='lateral-menu-text-item'>Combos</p>
            </a>
        </div>
    </div>
    <div class='body'>
        <div class='add-user-body'>
            <h3>Agregar Usuario</h3>
            <form>
                <div>
                    <div class='form-item'>
                        <label>Nombre*</label>
                        <input type="text" id="inputName" placeholder="Nombre" required>
                    </div>
                    <div class='form-item'>
                        <label>Apellido*</label>
                        <input type="text" id="inputLastName" placeholder="Apellido">
                    </div>
                    <div class='form-item'>
                        <label>Email*</label>
                        <input type="email" id="email" placeholder="Email">
                    </div>
                    <div class='form-item'>
                        <label>DNI*</label>
                        <input type="text" id="dni" placeholder="DNI">
                    </div>
                    <div class='form-item'>
                        <label>Teléfono*</label>
                        <input type="text" id="telephone" placeholder="Teléfono">
                    </div>
                    <div class='form-item'>
                        <label>Seleccione un rol:</label>
                        <select>
                            <option value='1'>Administrador</option>
                            <option value='2'>Empleado</option>
                        </select>
                    </div>
                    <div>
                        <button type="cancel" class='recover-button'>Cancelar</button>
                        <button type="submit" class='recover-button'>Aceptar</button>                        
                    </div>  
                </div>                                                                       
            </form>
        </div>
    </div>
</div>