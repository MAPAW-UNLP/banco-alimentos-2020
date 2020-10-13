@include('main')
@include('components.header')
@include('components.nav')

<form action="{{url('/combos/'.$combo->id)}}" method="post">
  {{method_field('PATCH')}}
    {{csrf_field()}}
  <label for="nombre">nombre</label><br>
  <input type="text" id="nombre" name="nombre" value="{{$combo->nombre}}"><br>

  <label for="productos"></label><br>
  <input type="text" id="productos" name="productos" value="{{$combo->productos}}"><br>

    <label for="stock"></label><br>
  <input type="number" id="stock" name="stock" value="{{$combo->stock}}"><br>

    <label for="cantOrg"></label><br>
  <input type="number" id="cantOrg" name="cantOrg" value="{{$combo->cantOrg}}"><br>

    <label for="contribucion"></label><br>
  <input type="number" id="contribucion" name="contribucion" value="{{$combo->contribucion}}"><br>

      <label for="estado"></label><br>
  <input type="number" id="estado" name="estado" value="{{$combo->estado}}"><br>

  <input type="submit" value="Editar">
</form>

@include('components.footer')