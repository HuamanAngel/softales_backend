@extends('layouts.app')


@section('contenido_js')
    
@endsection

@section('contenido_cSS')
    
@endsection


@section('content')
<br>
<br>
<br>
<br>
<div class="container">


    <form method="POST" action="{{ route('book.store') }}">
        @csrf
        <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Titulo del libro</label>
            <input type="text" name="title" required class="form-control" id="inputEmail4" placeholder="Titulo">
        </div>
        <div class="form-group col-md-6">
            <label for="inputEmail4">Resumen del libro</label>
            <input type="text" name="resumen" required class="form-control" id="inputEmail4" placeholder="Resumen">
        </div>
        </div>
        <div class="form-group">
            <label for="inputAddress">Fecha de publicacion</label>
            <input type="date" name="fecha_publicacion" required class="form-control">
        </div>
        <div class="form-group">
            <label for="inputAddress">Fecha de estreno</label>
            <input type="date" name="fecha_estreno" required class="form-control">
        </div>
        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Autores</label>
        <select class="custom-select my-1 mr-sm-2" required name="id_autor" id="inlineFormCustomSelectPref">

          <option selected>Autores...</option>
          @foreach ($authors as $author)
              <option value="{{ $author->id }}">{{ $author->use_name.' '.$author->use_apellido}}</option>
          @endforeach
        </select>       
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Registrar</button>
        </div>
  </form>

</div>
@endsection

@section('contenido_abajo_js')
    
@endsection