@extends('layouts.app')

@section('conteudo')
    <div class="container">

        <h1>Edição de Restaurante </h1>
        <hr>

        <form action="{{ route('restaurantes.update', $restaurante) }}" method="post">
            {{ csrf_field() }}
            <p class="form-group">
                <label> Nome do Restaurante </label> <br>
                <input type="text" name="name" value="{{$restaurante->name}}"  class="form-control  @if($errors->has('name')) is-invalid @endif">
                @if($errors->has('name'))
                    <span class="invalid-feedback">{{ $errors->first('name') }}</span>
                @endif
            </p >

            <p class="form-group">
                <label> Endereço </label> <br>
                <input type="text" name="address" value="{{$restaurante->address}}"  class="form-control  @if($errors->has('address')) is-invalid @endif">
                @if($errors->has('address'))
                    <span class="invalid-feedback">{{ $errors->first('address') }}</span>
                @endif
            </p>

            <p class="form-group">
                <label> Fale sobre o Restaurante </label> <br>
                <textarea name="description" id="" cols="30" rows="10"  class="form-control @if($errors->has('description')) is-invalid @endif">{{$restaurante->description}}</textarea>
                @if($errors->has('description'))
                    <span class="invalid-feedback">{{$errors->first('description')}}</span>
                @endif
            </p>

            <input type="submit" value="Atualizar" class="btn btn-success btn-lg" >

        </form>
    </div>

@endsection