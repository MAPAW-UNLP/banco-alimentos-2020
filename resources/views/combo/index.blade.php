<link rel="stylesheet" href="{{ url('css/lateral-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/combos.css') }}">
<link rel="stylesheet" href="{{ url('css/manage-social-area-organization-data.css') }}">
<link rel="stylesheet" href="{{ url('css/top-menu.css') }}">
<script>
    function changeStatus($path) {
        window.location=$path;
    }
</script>
@include('main')
@include('components.header')
@include('components.nav')
<div class='general-container'>
    @include('components.barra-izquierda')
        <div>
            <nav class='top-menu'>
                <div>
                    <a href="{{ url('/combos') }}" class='top-menu-item-color'>
                        <p class='top-menu-text-item'><b>Listado</b></p>
                    </a>
                </div>
                <div>
                    <a href="{{ url('/calendar') }}" class='top-menu-item'>
                    <p class='top-menu-text-item'>Calendario</p>
                    </a>
                </div>
                <div>
                    <a href="{{ url('/notificaciones') }}" class='top-menu-item'>
                    <p class='top-menu-text-item'>Notificaciones</p>
                    </a> 
                </div>   
            </nav> 
            <div class='body'>
                <div class='header-combo'>
                    <h3>Listado de combos</h3>
                    <div class='create-combo'><a href="{{ url('/combos/create') }}">Crear Combo</a></div>
                </div>
                <div class='body-combos'>
                    <div class='combo-titles'>
                        <div class='combo-title-first'></div>
                        <div class='combo-title'>Inactivo/Activo</div>
                        <div class='combo-title'>Stock</div>
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
                                    @if(($combo->estado) == 1)
                                    <input type="checkbox" id="check" onclick="changeStatus('{{ url('/cambiarEstado/'.$combo->id) }}')" value="{{ $combo->estado }}" checked >
                                    @endif
                                    @if(($combo->estado) == 0)
                                    <input type="checkbox" id="check" onclick="changeStatus('{{ url('/cambiarEstado/'.$combo->id) }}')" value="{{ $combo->estado }}" >
                                    @endif
                                    <span class="slider round"></span>
                                    </label>                       
                                </div>
                            </div>
                        </div>
                        <div class='combo-item'>
                            <div class='combo-item-prop-estado'>
                                <p>{{$combo->stock}}</p>
                            </div>
                        </div>
                        <div class='combo-item'>
                            <a href="{{url('/combos/'.$combo->id.'/edit')}}" style="background-color:#f2994a;">Ver más</a>
                        </div>
                        <div class='combo-item'>
                            <form method="post" action="{{url('/combos/'.$combo->id)}}">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <button class='delete' style="background-color: #dc3545;" type="submit">Eliminar</button>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@include('components.footer')