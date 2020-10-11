@include('main')
@include('components.header')
@include('components.nav')
<table>
        <th>asd   </th>
        <th>sad    </th>
        <th>dsa    </th>
        <th>ssa    </th> 
@foreach($combos as $combo)
    {{$loop->iteration}}
    {{$combo->nombre}}
@endforeach
</table>

@include('components.footer')