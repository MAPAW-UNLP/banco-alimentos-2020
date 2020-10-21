<link rel="stylesheet" href="{{ url('css/lateral-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/combos.css') }}">
@include('main')
@include('components.header')
@include('components.nav')
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
                <a href="{{ url('/solicitudes') }}" class='lateral-menu-item'>           
                    <p class='lateral-menu-text-item'>Gestion área social</p>
                </a>
            </div>
            <div>
                <a href="{{ url('/combos') }}" class='lateral-menu-item-color'>                          
                    <p class='lateral-menu-text-item'><b>Combos</b></p>              
                </a>
            </div>
        </div>
        <div class='body'>
            <div class='body-list'> 
                <h3>Listado de combos</h3>
                @foreach($combos as $combo)
                <div class='products'>
                    <h5>{{$combo->nombre}}</h5>
                    <p>{{$combo->productos}}</p>
                </div>
                <p>{{$combo->stock}}</p>
                <p>{{$combo->cantOrg}}</p>
                <p>{{$combo->contribucion}}</p>
                <p>{{$combo->estado}}</p>
                <div>
                    <a href="{{url('/combos/'.$combo->id.'/edit')}}">Editar</a>
                    <form method="post" action="{{url('/combos/'.$combo->id)}}">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <button type="submit">borrar</button>
                    </form>
                    </div>

                </div>
                @endforeach
            </div>
    </div>
</div>
@include('components.footer')