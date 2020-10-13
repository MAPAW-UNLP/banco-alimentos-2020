@include('main')
@include('components.header')
@include('components.nav')

<form action="{{url('/combos')}}" method="post">
    {{csrf_field()}}
<label for="nombre">{{$combo->nombre}}</label><br>
<label for="productos">{{$combo->productos}}</label><br>
<label for="stock">{{$combo->stock}}</label><br>
<label for="cantOrg">{{$combo->cantOrg}}</label><br>
<label for="contribucion">{{$combo->contribucion}}</label><br>
<label for="estado">{{$combo->estado}}</label><br>

@include('components.footer')