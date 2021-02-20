@extends('layouts.app')
@section('botones')
<a type="button" class="btn btn-primary" href={{ route('shoes.index') }}>Regresar</a>
@endsection
@section('content')
    {{--<h1>{{$receta}}</h1>--}}
    <article class="contenido-zapato">
        <h1 class="text-center">{{$zapatos->name_shoes}}</h1>
        <div class="imagen-zapato" style="margin-bottom: 30px; margin-left: auto; margin-right: auto">
            <img src="/storage/{{$zapatos->image}}" style="width:300px">
        </div>
        <div class="zapato-data">
            <p>
                <span class="font-weight-bold text-primary">Categoria: </span>{{$zapatos->categoriaZapato->name_category}}
            </p>
            <p>
                <span class="font-weight-bold text-primary">Marca: </span>{{$zapatos->marcaZapato->name_brand}}
            </p>
            <p>
                <span class="font-weight-bold text-primary">Autor: </span>{{$zapatos->autorZapato->name}}
            </p>
            <p>
                <span class="font-weight-bold text-primary">Talla: </span>{{$zapatos->size_shoes}}
            </p>
            <p>
                <span class="font-weight-bold text-primary">Precio: </span>{{$zapatos->price_shoes}}
            </p>
            <p>
                <span class="font-weight-bold text-primary">Fecha de creeacion: </span>
                {{date('d-m-Y', strtotime($zapatos->created_at))}}
            </p>
        </div>

    </article>
@endsection
