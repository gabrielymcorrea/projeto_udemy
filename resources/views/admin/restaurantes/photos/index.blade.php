@extends('layouts.app')

@section('conteudo')
    <div class="container">
        <div class="col-12">
            <h1>Cadastro de Fotos Restaurantes</h1>
            <hr>
        </div>
    
        <div class="col-12">
            <form action="{{route('restaurantes.photo.save', $restaurante_id)}}" enctype="multipart/form-data" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label>Carregar Fotos</label>
                    <input type='file' name="photos[]" multiple>
                </div>
                <div class="form-group"><button type=submit class="btn btn-lg btn-success m-2">Enviar Fotos</button></div>
            </form>
        </div>
    </div>
@endsection