@include('main')
@include('components.header')
@include('components.nav')
<table>
    <tr>
        <th>#</th>
        <th>nombre</th>
        <th>productos    </th>
        <th>stock    </th> 
        <th>cantOrg    </th> 
        <th>contribucion    </th> 
        <th>estado    </th> 
    </tr>
    <tr>
@foreach($combos as $combo)
    <td>{{$loop->iteration}}<td/>
    <td>{{$combo->nombre}}<td/>
    <td>{{$combo->productos}}<td/>
    <td>{{$combo->stock}}<td/>
    <td>{{$combo->cantOrg}}<td/>
    <td>{{$combo->contribucion}}<td/>
    <td>{{$combo->estado}}<td/>
    <td>
        <a href="{{url('/combos/'.$combo->id.'/edit')}}">Editar</a>
        <form method="post" action="{{url('/combos/'.$combo->id)}}">
        {{csrf_field()}}
        {{method_field('DELETE')}}
        <button type="submit">borrar</button>
        </form>
        <td/>

</tr>
@endforeach
</table>

@include('components.footer')