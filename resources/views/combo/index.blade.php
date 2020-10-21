<link rel="stylesheet" href="{{ url('css/lateral-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/combos.css') }}">
<link rel="stylesheet" href="{{ url('css/manage-social-area-organization-data.css') }}">
<script>
    function changeStatus() {
        alert("Agregar llamar back para cambiar el estado");
    }
    
</script>
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
            <h3>Listado de combos</h3>
            <div class='body-combos'>
                <div class='combo-titles'>
                    <div class='combo-title-first'></div>
                    <div class='combo-title'>Inactivo/Activo</div>
                    <div class='combo-title'>Estado</div>
                    <div class='combo-title'></div>
                </div>
                @foreach($combos as $combo)
                <div class='combo-container'>
                    <div class='combo-item'>               
                        <div class='combo'>
                            <h5>{{$combo->nombre}}</h5>
                                @foreach($combo->productos as $product)
                                    <p>{{$product->cantidad}} {{$product->producto}}</p>
                                @endforeach
                        </div>
                    </div>
                    <div class='combo-item'>
                        <div class='combo-item-prop'>
                            <div class='switch-section'>
                                <label class="switch">
                                <input type="checkbox" id="check" onclick="changeStatus()" value="{{ $combo->estado }}" checked >
                                <span class="slider round"></span>
                                </label>                       
                            </div>
                        </div>
                    </div>
                    <div class='combo-item'>
                        <div class='combo-item-prop-estado'>
                            @if(($combo->stock) == 1)
                            <p>En stock</p>
                            @endif
                            @if(($combo->stock) == 0)
                            <p>Agotado</p>
                            @endif
                        </div>
                    </div>
                    <div class='combo-item'>
                        <a href="{{url('/combos/'.$combo->id.'/edit')}}">Ver más</a>
                    </div>
                    <div class='combo-item'>
                        <form method="post" action="{{url('/combos/'.$combo->id)}}">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <button type="submit">Eliminar</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@include('components.footer')