<link rel="stylesheet" href="{{ url('css/lateral-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/top-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/manage-social-area.css') }}">
<link rel="stylesheet" href="{{ url('css/manage-social-area-organization-data.css') }}">

<div class='general-container'>
    <div class='lateral-menu'>
        <div>
            <a href="{{ url('/addUser') }}" class='lateral-menu-item'>
                <p class='lateral-menu-text-item'>Agregar usuario</p>
            </a>
        </div>
        <div>
            <a href="{{ url('/changePassword') }}" class='lateral-menu-item'>         
                <p class='lateral-menu-text-item'>Cambiar contraseña</p>
            </a>
        </div>
        <div>
            <a href="{{ url('/manageSocialArea') }}" class='lateral-menu-item-color'>           
                <p class='lateral-menu-text-item'><b>Gestion área social</b></p>
            </a>
        </div>
        <div>
            <a href="{{ url('/combos') }}" class='lateral-menu-item'>                          
                <p class='lateral-menu-text-item'>Combos</p>              
            </a>
        </div>
    </div>
    <div>
        <nav class='top-menu'>
            <div>
                <a href="{{ url('/manageSocialArea') }}" class='top-menu-item'>
                    <p class='top-menu-text-item'>Empadronamientos</p>
                </a>
            </div>
            <div>
                <a href="{{ url('/manageSocialArea/organizationData') }}" class='top-menu-item-color'>
                    <p class='top-menu-text-item'><b>Datos de Organizaciones</b></p>
                </a>
            </div>
            <div>
                <a href="{{ url('/manageSocialArea/pendingModification') }}" class='top-menu-item'>
                    <p class='top-menu-text-item'>Modificaciones pendientes</p>
                </a> 
            </div>   
        </nav> 
        <div class='body'>
            <div class='body-organization-data'>
                <div class='header-section'>
                    <h3>Organizaciones</h3>
                    <p>Inactivo / Activo</p>
                </div>
                <div class='request-section'>
                    <div class='request-section-text'>
                        <p><b>Nombre institución:</b> xxxxxxx</p>
                    </div>
                    <div class='switch-section'>
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider round"></span>
                        </label>                       
                    </div>
                </div>
            </div>
        </div>
        <table>
        <tr>
            <th>email</th>
        </tr>
         <tr>
            @foreach($organizaciones as $organizacion)
            <td>{{$loop->iteration}}</td>
            <td>{{$organizacion->email}}<td>
            <td>{{$organizacion->nombre}}<td>
                
        </tr>
@endforeach
</table>
    </div>
</div>