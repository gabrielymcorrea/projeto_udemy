@extends('layouts.app')

@section('conteudo')
    <div class="container">
        <h1>Inserção de Cardápio </h1>
        <hr>
        <form action="{{ route('menu.store') }}" method="post" class="table table-striped">
            {{ csrf_field() }}
            <p class="form-group">
                <label> Nome do Cardápio </label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control @if($errors->has('name')) is-invalid @endif">
                @if($errors->has('name'))
                    <span class="invalid-feedback">{{ $errors->first('name') }}</span>
                @endif
            </p>

            <p class="form-group">
                <label> Preço </label> 
                <input type="text" name="preco" value="{{old('preco')}}" class="form-control @if($errors->has('preco')) is-invalid @endif">
                @if($errors->has('preco'))
                    <span class="invalid-feedback">{{ $errors->first('preco') }}</span>
                @endif
            </p>

            <p class="form-group">
    
                <select name="restaurante_id" class="form-control"> 
                    <option value="">Selecione um restaurante </option>
                    @foreach($restaurantes as $r)
                        <option value="{{ $r->id }}">{{$r->name}}</option>
                    @endforeach
                </select>

                @if($errors->has('restaurante_id'))
                    <span class="invalid-feedback">{{ $errors->first('restaurante_id') }}</span>
                @endif
            </p>

            <input type="submit" value="Cadastrar" class="btn btn-success btn-lg">

        </form>
    </div>

@endsection


