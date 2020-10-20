@include('main')
@include('components.header')
@include('components.nav')

<form action="{{url('/combos/'.$combo->id)}}" method="post">
  {{method_field('PATCH')}}
    {{csrf_field()}}
  <label for="nombre">nombre</label><br>
  <input type="text" id="nombre" name="nombre" value="{{$combo->nombre}}"><br>

    <label for="stock"></label><br>
  <input type="number" id="stock" name="stock" value="{{$combo->stock}}"><br>

    <label for="cantOrg"></label><br>
  <input type="number" id="cantOrg" name="cantOrg" value="{{$combo->cantOrg}}"><br>

    <label for="contribucion"></label><br>
  <input type="number" id="contribucion" name="contribucion" value="{{$combo->contribucion}}"><br>

      <label for="estado"></label><br>
  <input type="number" id="estado" name="estado" value="{{$combo->estado}}"><br>
  <table>
  @foreach($combo->productos as $producto)
  <tr>
    <td><input type="text" name="producto[]" value="{{$producto->producto}}"/>  </td>
    <td><input type="number" name="cant[]" value="{{$producto->cantidad}}"/></td>
  </tr>
  @endforeach
<table>
  <input type="submit" value="Editar">
</form>

@include('components.footer')