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
            <table class="table" name="cantPersonas" style="text-align:center;">
                <thead>
                    <tr>
                        <th>Turno</th>
                        <th>Combos</th>
                        <th>estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pedidos as $pedido)
                    <tr>
                        <td>{{$pedido->turno->fechaHora}} - {{$pedido->turno->horario->nombre }}</td>
                        <td>
                            <p>
                            <a data-toggle="collapse" href="#a{{$pedido->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                              Ver productos
                            </a>
                            </p>
                            <div class="collapse" id="a{{$pedido->id}}">
                                <div class="card card-body">
                                    @foreach($pedido->combosPedidos as $comboPedido)
                                        {{$comboPedido->combo->nombre}}
                                        <br>
                                    @endforeach
                                </div>
                            </div>
                        </td>
                        <td>{{$pedido->estado}}</td>
                    </tr>
                    @endforeach
            </table>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@include('components.footer')
