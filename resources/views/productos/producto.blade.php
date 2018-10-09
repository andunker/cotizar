<img class="img-thumbnail" src="https://picsum.photos/600/338">

<p class="card-text">
{{$producto->id}}
{{$producto->nombre}}
{{$producto->descripcion}}
</p>



{{-- <img class="img-thumbnail" src="{{ $producto->image}}">

<p class="card-text">

    <div class="text-muted">Escrito por <a href="/{{$producto->user->username}}">{{ $producto
            ->user->name }}</a> </div>
    {{ $producto->content }}
    <a href="/productos/{{$producto->id}}">Leer mas</a>
</p>
<div class="card-text text-muted float-right">

    {{$producto->created_at}}
</div> --}}
