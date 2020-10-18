@include('main')
@include('components.header')
@include('components.nav')

<form action="{{url('/combos')}}" method="post">
    {{csrf_field()}}
<label for="nombre"></label><br>
<label for="productos"></label><br>
<label for="stock"></label><br>
<label for="cantOrg"></label><br>
<label for="contribucion"></label><br>
<label for="estado"></label><br>

@include('components.footer')