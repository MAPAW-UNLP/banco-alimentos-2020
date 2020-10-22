<link rel="stylesheet" href="{{ url('css/lateral-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/add-user.css') }}">

<div class='general-container'>
<div class='lateral-menu'>
        <div>
            <a href="{{ url('/addUser') }}" class='lateral-menu-item-color' title="Agregar usuario">
                <p class='lateral-menu-text-item'><b>Agregar usuario</b></p>
            </a>
        </div>
        <div>
            <a href="{{ url('/changePassword') }}" class='lateral-menu-item' title="Cambiar contraseña">         
                <p class='lateral-menu-text-item'>Cambiar contraseña</p>
            </a>
        </div>
        <div>
            <a href="{{ url('/solicitudes') }}" class='lateral-menu-item' title="Gestión de área social">           
                <p class='lateral-menu-text-item'>Gestion área social</p>
            </a>
        </div>
        <div>
            <a href="{{ url('/combos') }}" class='lateral-menu-item' title="Sector combos">                          
                <p class='lateral-menu-text-item'>Combos</p>              
            </a>
        </div>
    </div>
    <div class='body'>
        <div class='add-user-body'>
            <h3>Agregar Usuario</h3>
            <form action="{{url('/users')}}" method="post">
            {{method_field('POST')}}
            {{csrf_field()}}
                <div>
                    <div class='form-item'>
                        <label title="Nombre de usuario">Nombre*</label>
                        <input type="text" id="name" name ="name" placeholder="Nombre" required title="Nombre de usuario">
                    </div>
                    <div class='form-item'>
                        <label  title="Email del usuario">Apellido*</label>
                        <input type="text" id="apellido"  name ="apellido" placeholder="Apellido" required title="Apellido del usuario">
                    </div>
                    <div class='form-item'>
                        <label title="Email del usuario">Email*</label>
                        <input type="email" id="email" name ="email" placeholder="Email" required title="Email del usuario">
                    </div>
                    <div class='form-item'>
                        <label  title="Dni del usuario">DNI*</label>
                        <input type="text" id="dni" name="dni" placeholder="DNI" required title="Dni del usuario">
                    </div>
                    <div class='form-item'>
                        <label title="Teléfono del usuario">Teléfono*</label>
                        <input type="text" id="telefono" name="telefono" placeholder="Teléfono" required title="Teléfono del usuario">
                    </div>
                    <div class='form-select-item'>
                        <label title="Rol del usuario">Seleccione un rol</label>
                        <select id="rol_id" name="rol_id" title="Rol del usuario">                            
                            <option value='3'>Empleado</option>
                            <option value='4'>Organizacion</option>
                            <option value='5'>Administrador</option>
                        </select>
                    </div>
                    <div class='buttons-section'>
                        <button type="reset" class='cancel-button' title="Cancelar registro">Cancelar</button>
                        <button type="submit" title="Aceptar registro">Aceptar</button>                        
                    </div>  
                </div>                                                                       
            </form>
        </div>
    </div>
</div>