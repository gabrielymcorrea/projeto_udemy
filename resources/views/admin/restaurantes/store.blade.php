@extends('layouts.app')

@section('conteudo')
    <div class="container">
        <h1>Inserção de Restaurante </h1>
        <hr>
        <form action="{{ route('restaurantes.store') }}" method="post" class="table table-striped">
            {{ csrf_field() }}
            <p class="form-group">
                <label> Nome do Restaurante </label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control @if($errors->has('name')) is-invalid @endif">
                @if($errors->has('name'))
                    <span class="invalid-feedback">{{ $errors->first('name') }}</span>
                @endif
            </p>

            <p class="form-group">
                <label> Endereço </label> 
                <input type="text" name="address" value="{{old('address')}}" class="form-control @if($errors->has('address')) is-invalid @endif">
                @if($errors->has('address'))
                    <span class="invalid-feedback">{{ $errors->first('address') }}</span>
                @endif
            </p>

            <p class="form-group">
                <label> Fale sobre o Restaurante </label> 
                <textarea name="description" id="" cols="30" rows="10" class="form-control @if($errors->has('description')) is-invalid @endif" > {{old('description')}}</textarea>
                @if($errors->has('description'))
                    <span class="invalid-feedback">{{$errors->first('description')}}</span>
                @endif
            </p>

            <input type="submit" value="Cadastrar" class="btn btn-success btn-lg">

        </form>
    </div>

@endsection


