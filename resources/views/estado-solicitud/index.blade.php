<link rel="stylesheet" href="{{ url('css/lateral-menu.css') }}">
<link rel="stylesheet" href="{{ url('css/manage-social-area.css') }}">
<link rel="stylesheet" href="{{ url('css/solicitudes-organizacion.css') }}">
<link rel="stylesheet" href="{{ url('css/estado-solicitud.css') }}">

@include('main')
@include('components.header')
@include('components.nav')
<div class='general-container'>
@include('components.barra-izquierda')
    <div class='general-body'>
      <nav class='top-menu'>
        <div>
            <a href="{{ url('/estadoSolicitud') }}" class='top-menu-item-color'>
                <p class='top-menu-text-item'><b>Solicitud de Combos</b></p>
            </a>
        </div>
        <div>
            <a href="{{ url('/estadoSolicitud/indexDatos') }}" class='top-menu-item'>
                <p class='top-menu-text-item'>Solicitud de Datos</p>
            </a>
        </div>  
      </nav> 
      <div class='body'>
        <div class='body-request'>
          <h3>Solicitudes de Combos</h3>
          <div class='combos-body'>
            @if(count($pedidos) > 0)
              <h4 class='font-white'>Combos</h4>
              @foreach($pedidos as $pedido)
                <div class='solicitudes-tabla'>
                @foreach($pedido->combosPedidos as $comboPedido)
                  <div class='request-section-text'>  
                  
                    <p><b>{{$comboPedido->combo->nombre}}</b></p>
                  
                  </div> 
                  <div class='buttons-section'>
                    <button type="submit" class='show-more'><a href="{{ url('/estadoSolicitud/solicitudCombos/'.$comboPedido->combo->id)}}">Ver mas</a></button>                     
                  </div>
                  @endforeach
                </div>
              @endforeach
            @else
              <h5> No dispone de solicitudes de combos</h5>
            @endif              
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@include('components.footer')