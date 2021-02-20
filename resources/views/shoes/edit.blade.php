@extends('layouts.app')

@section('botones')
<a type="button" class="btn btn-primary" href={{ route('shoes.index') }}>Regresar</a>
@endsection

@section('content')
    <h2 class="text-center mb-5"> Editar Calzado: {{$zapato->name_shoes}}</h2>
    <div class="row justify-content-center mt-2">
        <div class="col-md-8">
            <form method="POST" action="{{route('shoes.update', ['zapato'=>$zapato->id])}}" enctype="multipart/form-data" novalidate>
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="name">Nombre de Calzado</label>
                    <input type="text" name="name" value="{{$zapato->name_shoes}}" class="form-control @error('name')
                        is-invalid
                    @enderror"
                    id="name" required="" value={{old('name')}}>
                    @error('name')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="size">Talla del calzado</label>
                    <input type="text" value="{{$zapato->size_shoes}}" name="size" class="form-control @error('size')
                        is-invalid
                    @enderror"
                    id="size" required="" value={{old('size')}}>
                    @error('size')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="price">Precio</label>
                    <input type="number" value="{{$zapato->price_shoes}}" name="price" class="form-control @error('price')
                        is-invalid
                    @enderror" id="price" required="" value={{old('price')}}>
                    @error('price')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                        <label for="image">Imagen del calzado</label>
                        <input id=image type="file" class="form-control @error('preparacion') is-invalid @enderror" name="image" >
                        <div class="mt-4">
                            <p>Imagen Actual</p>
                            <img src="/storage/{{$zapato->image}}" style="width:300px">
                        </div>
                         @error('image')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                <div class="form-group">
                    <label for="category">Categoria del Calzado</label>
                     <select name="category" class="form-control @error('category')
                        is-invalid
                    @enderror" id="category">
                    <option value="">---Seleccione---</option>
                         @foreach($categorias as $categoria)
                            <option value="{{$categoria->id}}" {{$zapato->categoria_id==$categoria->id ? 'selected':''}}>{{$categoria->name_category}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="brand">Marca del Calzado</label>
                    <select name="brand" class="form-control @error('brand')
                        is-invalid
                    @enderror" id="brand">
                    <option value="">---Seleccione---</option>
                         @foreach($marcas as $marca)
                            <option value="{{$marca->id}}" {{$zapato->marca_id==$marca->id ? 'selected':''}}>{{$marca->name_brand}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Editar Calzado</button>
                </div>

            </form>
        </div>
    </div>
@endsection
