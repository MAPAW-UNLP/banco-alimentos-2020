@include('main')
@include('components.header')
@include('components.nav')
<table>
    <tr>
        <th>email</th>
    </tr>
    <tr>
        <th>nombre</th>
    </tr>
    <tr>
@foreach($organizaciones as $organizacion)
    <td>{{$loop->iteration}}</td>
    <td>{{$organizacion->nombre}}</td>


</tr>
@endforeach
</table>

@include('components.footer')