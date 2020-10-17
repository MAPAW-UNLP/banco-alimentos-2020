<link rel="stylesheet" href="{{ url('css/lateral-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/add-user.css') }}">

<div class='general-container'>
<div class='lateral-menu'>
        <div>
            <a href="{{ url('/addUser') }}" class='lateral-menu-item-color'>
                <p class='lateral-menu-text-item'><b>Agregar usuario</b></p>
            </a>
        </div>
        <div>
            <a href="{{ url('/changePassword') }}" class='lateral-menu-item'>         
                <p class='lateral-menu-text-item'>Cambiar contraseña</p>
            </a>
        </div>
        <div>
            <a href="{{ url('/manageSocialArea') }}" class='lateral-menu-item'>           
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
            <h3>Agregar Usuario</h3>
            <form>
                <div>
                    <div class='form-item'>
                        <label>Nombre*</label>
                        <input type="text" id="inputName" placeholder="Nombre" required>
                    </div>
                    <div class='form-item'>
                        <label>Apellido*</label>
                        <input type="text" id="inputLastName" placeholder="Apellido" required>
                    </div>
                    <div class='form-item'>
                        <label>Email*</label>
                        <input type="email" id="email" placeholder="Email" required>
                    </div>
                    <div class='form-item'>
                        <label>DNI*</label>
                        <input type="text" id="dni" placeholder="DNI" required>
                    </div>
                    <div class='form-item'>
                        <label>Teléfono*</label>
                        <input type="text" id="telephone" placeholder="Teléfono" required>
                    </div>
                    <div class='form-select-item'>
                        <label>Seleccione un rol</label>
                        <select>                            
                            <option value='1'>Empleado</option>
                            <option value='2'>Administrador</option>
                        </select>
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