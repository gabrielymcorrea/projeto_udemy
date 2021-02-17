@extends('layouts.app')

@section('conteudo')
    <div class="container">
        <h1>Cadastro </h1>
        <hr>
        <form action="{{ route('user.store') }}" method="post" class="table table-striped">
            {{ csrf_field() }}
            <p class="form-group">
                <label> Nome do Usuário </label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control @if($errors->has('name')) is-invalid @endif">
                @if($errors->has('name'))
                    <span class="invalid-feedback">{{ $errors->first('name') }}</span>
                @endif
            </p>

            <p class="form-group">
                <label> Email </label> 
                <input type="email" name="email" value="{{old('email')}}" class="form-control @if($errors->has('email')) is-invalid @endif">
                @if($errors->has('email'))
                    <span class="invalid-feedback">{{ $errors->first('email') }}</span>
                @endif
            </p>

            <p class="form-group">
                <label> Senha </label> 
                <input type="password" name="password" value="{{old('password')}}" class="form-control @if($errors->has('password')) is-invalid @endif">
                @if($errors->has('password'))
                    <span class="invalid-feedback">{{ $errors->first('password') }}</span>
                @endif
            </p>

            <p class="form-group">
                <label> Confirma senha </label> 
                <input type="password" name="confirm_password" value="{{old('confirm_password')}}" class="form-control @if($errors->has('confirm_password')) is-invalid @endif">
                @if($errors->has('confirm_password'))
                    <span class="invalid-feedback">{{ $errors->first('confirm_password') }}</span>
                @endif
            </p>

            <input type="submit" value="Cadastrar" class="btn btn-success btn-lg">

        </form>
    </div>

@endsection


