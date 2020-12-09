<h4><b>Listado de pedidos</b></h4>
<br>
<table class="table" style="text-align:center; width:100%; border:1px;" border="1">
  <thead>
    <tr>
      <th scope="col">Id Organización</th>
      <th scope="col">Fecha</th>
      <th scope="col">Hora</th>
      <th scope="col">Combos</th>
      <th scope="col">Contribución</th>
    </tr>
  </thead>
  <tbody>
    @foreach($datos as $pedido)
        <?php $fecha = date('d-m-Y', strtotime($pedido->turno->fechaHora));?>
    <tr>
      <th scope="row">{{$pedido->organizacione->organizacion_id}}</th>
        <td>{{ $fecha}}</td>
        <td>{{$pedido->turno->horario->nombre }}</td>
        <td>
            @foreach($pedido->combosPedidos as $comboPedido)
                {{$comboPedido->cantidad}} - {{$comboPedido->combo->nombre}}
                <br>
            @endforeach
        </td>
        <td><?php $total = 0; ?>
            @foreach($pedido->combosPedidos as $comboPedido)
                @php
                    $total = $total + $comboPedido->combo->contribucion;
                @endphp
            @endforeach
            <b>${{$total}}</b>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
