@extends('layouts.app')

@section('conteudo')
    <div class="container">

        <h1>Edição de Restaurante </h1>
        <hr>

        <form action="{{ route('user.update', $user) }}" method="post">
            {{ csrf_field() }}
            <p class="form-group">
                <label> Nome  </label> <br>
                <input type="text" name="name" value="{{$user->name}}"  class="form-control  @if($errors->has('name')) is-invalid @endif">
                @if($errors->has('name'))
                    <span class="invalid-feedback">{{ $errors->first('name') }}</span>
                @endif
            </p >

            <p class="form-group">
                <label> Email </label> <br>
                <input type="email" name="email" value="{{$user->email}}"  class="form-control  @if($errors->has('email')) is-invalid @endif">
                @if($errors->has('email'))
                    <span class="invalid-feedback">{{ $errors->first('email') }}</span>
                @endif
            </p>

            <p class="form-group">
                <label> Senha </label> <br>
                <input type="password" name="password" class="form-control  @if($errors->has('password')) is-invalid @endif">
                @if($errors->has('password'))
                    <span class="invalid-feedback">{{ $errors->first('password') }}</span>
                @endif
            </p>
           

            <input type="submit" value="Atualizar" class="btn btn-success btn-lg" >

        </form>
    </div>

@endsection