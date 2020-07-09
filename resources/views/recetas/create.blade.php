@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.css" integrity="sha512-pTg+WiPDTz84G07BAHMkDjq5jbLS/AqY0rU/QdugnfeE0+zu0Kjz++0rrtYNK9gtzEZ33p+S53S2skXAZttrug==" crossorigin="anonymous" />
@section( 'botones')
    <a href="{{ route('recetas.index') }}"  class="btn btn-primary mr-2 text-white">volver</a>
@endsection

@section( 'content')
    <h2 class="text-center mb-5">Crear Nueva Receta</h2>

    
 <!--Formulario para agregar el nombre de la receta a la base de datos--> 
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <form action="{{ route('recetas.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="form-group">
                    <label for="titulo">Titulo Receta</label>
                    <input type="text"
                            name="titulo"
                            class="form-control @error('titulo') is-invalid @enderror"
                            id="titulo"
                            placeholder="Titulo Receta"
                            value="{{ old('titulo') }}">

                            @error('titulo')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message}}</strong>

                            </span>                   
                            @enderror
                </div>
                 <!--Formulario para la seleccion de categorias,agregadas en la base de datos--> 
                <div class="from-group mt-4">
                    <label for="categoria">Categorias</label>

                    <select name="categoria" 
                    class="form-control @error('categoria') is-invalid @enderror" 
                    id="categoria">

                    <option value="">-- Seleccione --</option>
                    @foreach($categorias as $id => $categoria)
                        <option value="{{ $id }}" {{ old('categoria')== $id ? 'selected' : '' }}>{{ $categoria }}</option>    
                    @endforeach
                    </select>  
                    @error('categoria')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message}}</strong>
                    </span>
                    @enderror 
                </div>
           <!--Trix-editor para agregar el texto de preparacion de la receta --> 
                <div class="form-group mt-4">
                
                    <label for="preparacion">Preparación</label>
                    <input  id="preparacion" type="hidden" name="preparacion" value="{{ old('preparacion') }}">
                    <trix-editor 
                        input="preparacion"
                        class="form-control @error('preparacion') is-invalid @enderror">
                    </trix-editor>
                    @error('preparacion')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message}}</strong>
                    </span>
                    @enderror 
                </div>
                 <!--Trix-editor para agregar el texto de los ingredientes de la receta --> 
                 <div class="form-group mt-4">
                    <label for="ingredientes">Ingredientes</label>
                    <input  id="ingredientes" type="hidden" name="ingredientes" value="{{ old('ingredientes') }}">
                    <trix-editor 
                        input="ingredientes" 
                        class="form-control @error('ingredientes') is-invalid @enderror">
                    </trix-editor>
                    @error('ingredientes')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message}}</strong>
                    </span>
                    @enderror 
                </div>
                <!--Formulario para agregar imagen -->
                <div class="form-group mt-4">
                    <label for="ingredientes">Ingredientes</label>
                    <input 
                    type="file" 
                    id="imagen" 
                    class="form-control @error('ingredientes') is-invalid @enderror" 
                    name="imagen">
                    @error('imagen')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message}}</strong>
                    </span>
                    @enderror 
                </div>

                 <!--Boton para enviar los datos --> 
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Agregar Receta">
                </div>
            </form>

        </div>
    </div>


@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.3/trix.js" integrity="sha512-EkeUJgnk4loe2w6/w2sDdVmrFAj+znkMvAZN6sje3ffEDkxTXDiPq99JpWASW+FyriFah5HqxrXKmMiZr/2iQA==" crossorigin="anonymous"></script>
@endsection