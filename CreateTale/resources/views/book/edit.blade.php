@extends('layouts.app')


@section('contenido_js')
    
@endsection

@section('contenido_cSS')
    
@endsection


@section('content')
<br>
<br>
<div class="container">
    <div class="row">
        <!-- Image -->
        <div class="col-12 col-lg-6">
            <div class="card bg-light mb-3">
                <div class="card-body">
                    <a href="" data-toggle="modal" data-target="#productModal">
                        <img class="img-fluid" src="https://mymodernmet.com/wp/wp-content/uploads/2022/02/how-to-draw-a-book-1.jpg" />
                    </a>
                </div>
            </div>
        </div>

        <!-- Add to cart -->
        <div class="col-12 col-lg-6 add_to_cart_block">
            <div class="card bg-light mb-3">
                <div class="card-body">
                    <h4 class="price font-weight-bold">{{ $book->title }}</h4>
                    <label class="price_discounted font-weight-bold">Editorial : </label>
                    <label class="price_discounted"> {{ $book->editorial }} </label>

                    <br>
                    <label class="price_discounted font-weight-bold">Autor : </label>
                    <label class="price_discounted"> {{ $book->bookAutor->Nombre.' '.$book->bookAutor->Apellido }} </label>

                    <br>

                    <label class="price_discounted font-weight-bold">Foto del autor : </label>
                    <br>

                    <label class="price_discounted"> <img width="100%" height="200px" src="https://www.swissinfo.ch/resource/image/46543860/landscape_ratio16x9/1920/1080/e9dc93e4360c211cc869c9295ac0b9fd/E66F49B5ABB18830C6851AB7CF383D65/image_doc-9893p7.jpg" alt="" srcset="">  </label>
                    <br>
                    <label class="price_discounted font-weight-bold">Fecha nacimiento : </label>
                    <label class="price_discounted"> {{ $book->bookAutor->Fecha_Nacimiento }} </label>
                    <div class="datasheet p-3 mb-2 bg-success text-white text-center" >
                        <a href="" class="text-white ">Solicitar prestamo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card border-light mb-3">
                <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-align-justify"></i> Descripcion</div>
                <div class="card-body">
                    <p class="card-text">
                        {{ $book->descripcion }}                        
                    </p>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card border-light mb-3">
                <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-align-justify"></i> Resumen</div>
                <div class="card-body">
                    <p class="card-text">
                        {{ $book->resumen }}                        
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@section('contenido_abajo_js')
    
@endsection