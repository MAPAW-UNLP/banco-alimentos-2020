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
          @if($sinOrga ?? '' == 1)
            No cuenta con una organizacion asociada a su usuario.
          @else
          <div class='combos-body'>
            @if(count($pedidos) > 0)
            <table class="table" name="cantPersonas" style="text-align:center;">
                <thead>
                    <tr>
                        <th>Turno</th>
                        <th>Combos</th>
                        <th>Contribución</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pedidos as $pedido)
                    <tr>
                        <td>
                        <?php $fecha = date('d-m-Y', strtotime($pedido->turno->fechaHora));?>
                            <b>Fecha: {{ $fecha }}</b>
                            <br>
                            <b>Horario: {{$pedido->turno->horario->nombre }}</b>
                        </td>
                        <td>
                            <p>
                            <a data-toggle="collapse" href="#a{{$pedido->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                              Ver combos
                            </a>
                            </p>
                            <div class="collapse" id="a{{$pedido->id}}">
                                <div class="card card-body">
                                    @foreach($pedido->combosPedidos as $comboPedido)
                                        {{$comboPedido->cantidad}} - {{$comboPedido->combo->nombre}}
                                        <br>
                                    @endforeach
                                </div>
                            </div>
                        </td>
                        <td>
                            <?php $total = 0; ?>
                            @foreach($pedido->combosPedidos as $comboPedido)
                                @php
                                    $total = $total + $comboPedido->combo->contribucion;
                                @endphp
                            @endforeach
                            <b>${{$total}}</b>
                        </td>
                    </tr>
                    @endforeach
            </table>
            @endif
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@include('components.footer')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
