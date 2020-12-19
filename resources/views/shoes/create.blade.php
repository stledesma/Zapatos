@extends('layouts.app')

@section('botones')
<a type="button" class="btn btn-primary" href={{ route('shoes.index') }}>Regresar</a>
@endsection

@section('content')
    <h2 class="text-center mb-5">Registra tu nuevo Calzado</h2>
    <div class="row justify-content-center mt-2">
        <div class="col-md-8">
            <form method="POST" action={{ route('shoes.store') }} novalidate>
                @csrf
                <div class="form-group">
                    <label for="name">Nombre de Calzado</label>
                    <input type="text" name="name" class="form-control @error('name')
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
                    <input type="text" name="size" class="form-control @error('size')
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
                    <input type="number" name="price" class="form-control @error('price')
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
                    <input type="file" name="image" class="form-control @error('image')
                        is-invalid
                    @enderror"
                    id="image" required="">
                    @error('image')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category">Categoria del Calzado</label>
                     <select name="category" class="form-control @error('category')
                        is-invalid
                    @enderror" id="category">
                    <option value="">---Seleccione---</option>
                         @foreach($category as $id => $categorys)
                            <option value="{{$id}} ">{{$categorys}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="brand">Marca del Calzado</label>
                    <select name="brand" class="form-control @error('brand')
                        is-invalid
                    @enderror" id="brand">
                    <option value="">---Seleccione---</option>
                         @foreach($brand as $id => $brands)
                            <option value="{{$id}} ">{{$brands}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>

            </form>
        </div>
    </div>
@endsection
