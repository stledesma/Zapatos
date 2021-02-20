@extends('layouts.app')
@section('botones')
<a type="button" class="btn btn-primary" href={{ route('shoes.index') }}>Regresar</a>
@endsection
@section('content')
    {{--<h1>{{$receta}}</h1>--}}
    <article class="contenido-zapato">
        <h1 class="text-center">{{$zapato->name_shoes}}</h1>
        <div class="imagen-zapato">
            <img src="/storage/{{$zapato->image}}" class="w-100">
        </div>
        <div class="zapato-data">
            <p>
                <span class="font-weight-bold text-primary">Categoria: </span>{{$zapato->categoriaZapato->name_category}}
            </p>
            <p>
                <span class="font-weight-bold text-primary">Marca: </span>{{$zapato->marcaZapato->name_brand}}
            </p>
            <p>
                <span class="font-weight-bold text-primary">Autor: </span>{{$zapato->autorZapato->name}}
            </p>
            <p>
                <span class="font-weight-bold text-primary">Fecha: </span>
                {{date('d-m-Y', strtotime($zapato->created_at))}}
            </p>

        </div>

        <div class="size">
            <h2 class="my-3 text-primary">Talla</h2>
            {!!$zapato->size_shoes!!}
        </div>

        <div class="precio">
            <h2 class="my-3 text-primary">Precio</h2>
            {!!$zapato->price_shoes!!}
        </div>

    </article>
@endsection
