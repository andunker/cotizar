@extends('layouts.app')

@section('content')

<div class="row">
@forelse($productos as $producto)
<div class="col-6">

    <!-- ahora incluimos el template que creamos message.blade, que esta en la carpera messages -->
    @include('productos.producto')
</div>

@empty
<!-- la instruccion forelse el empty sirve para cuando se manda un array que no tiene contenido que ejecute este bloque -->
<p>No hay mensajes destacados</p>
@endforelse
</div>
@endsection
