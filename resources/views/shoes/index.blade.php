@extends('layouts.app')

@section('botones')
<a type="button" class="btn btn-primary" href={{ route('shoes.create') }}>Registrar Zapatos</a>
@endsection

@section('content')
    <h2 class="text-center mb-5">Administra tus Productos</h2>
    <div class="col-md-10 mx-auto bg-white p-J">
        <table class="table">
            <thead class="thead-dark text-center">
                <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Talla</th>
                <th scope="col">Precio</th>
                <th scope="col">Categoria</th>
                <th scope="col">Marca</th>
                <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach($userZapato as $shoes)
                    <tr>
                        <th scope="row">{{ $shoes->name_shoes}}</th>
                        <td>{{$shoes->size_shoes}}</td>
                        <td>$ {{$shoes->price_shoes}}</td>
                        <td>{{$shoes->categoriaZapato->name_category}}</td>
                        <td>{{$shoes->marcaZapato->name_brand}}</td>
                        <td>
                            <a href="{{route('shoes.show',['zapato'=>$shoes->id])}}" class="btn btn-success">Ver</a>
                            <a href="{{route('shoes.edit',['zapato'=>$shoes->id])}}" class="btn btn-dark">Editar</a>
                            <eliminar-zapato id-zapato={{$shoes->id}}></eliminar-zapato>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
