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

<div class="box">
    <div class="container">
     	<div class="row">
            @foreach ($books as $book)
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="card">
                        <img class="card-img-top" src="https://mymodernmet.com/wp/wp-content/uploads/2022/02/how-to-draw-a-book-1.jpg" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title"><a href="" title="View Product">{{ $book->title }}</a></h4>
                            <p class="card-text">{{ $book->descripcion }}</p>
                            <div class="badge badge-primary">{{ $book->bookAutor->Nombre.' '.$book->bookAutor->Apellido }}</div>
                            <div class="row">
                                <div class="col">
                                    <form action="{{ route('book.borrow') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id_book" value="{{ $book->id }}">
                                        <button type="submit" class="btn btn-danger btn-block delete-book" >Solicitar libro</button>
                                    </form>
                                </div>
                                <div class="col">
                                    <a href="{{ route('book.form.edit',$book->id) }}" class="btn btn-info btn-block">Ver detalles</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
            @endforeach
		</div>		
    </div>
</div>


@endsection

@section('contenido_abajo_js')
 
@endsection