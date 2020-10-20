@include('main')
@include('components.header')
@include('components.nav')

<form action="{{url('/combos')}}" method="post">
    {{csrf_field()}}
    <label for="nombre">nombre</label><br>
  <input type="text" id="nombre" name="nombre"><br>

    <label for="stock">stock</label><br>
  <input type="number" id="stock" name="stock"><br>

    <label for="cantOrg">cantOrg</label><br>
  <input type="number" id="cantOrg" name="cantOrg"><br>

    <label for="contribucion">contribucion</label><br>
  <input type="number" id="contribucion" name="contribucion"><br>

      <label for="estado">estado</label><br>
  <input type="number" id="estado" name="estado"><br>
  <table>
  <tr>
    <td><input type="text" name="producto[]" /></td>
    <td><input type="number" name="cant[]" /></td>
  </tr>
  <tr>
    <td><input type="text" name="producto[]" /></td>
    <td><input type="number" name="cant[]" /></td>
  </tr>
<table>
  <input type="submit" value="Editar">
  </form>
@include('components.footer')