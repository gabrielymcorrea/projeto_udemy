@extends('layouts.app')

@section('conteudo')
    <div class="container">

        <h1>Edição de cardápio</h1>
        <hr>

        <form action="{{ route('menu.update', $menu) }}" method="post">
            {{ csrf_field() }}
            <p class="form-group">
                <label> Nome do Cardápio </label> <br>
                <input type="text" name="name" value="{{$menu->name}}"  class="form-control  @if($errors->has('name')) is-invalid @endif">
                @if($errors->has('name'))
                    <span class="invalid-feedback">{{ $errors->first('name') }}</span>
                @endif
            </p >

            <p class="form-group">
                <label> Preço </label> <br>
                <input type="text" name="preco" value="{{$menu->preco}}"  class="form-control  @if($errors->has('preco')) is-invalid @endif">
                @if($errors->has('preco'))
                    <span class="invalid-feedback">{{ $errors->first('preco') }}</span>
                @endif
            </p>

            <p class="form-group">
                <label> Restaurante </label> <br>
                <select name="restaurante_id" class="form-control"> 
                    @foreach($restaurantes as $r)
                        <option value="{{ $r->id }}"
                        @if($menu->restaurante_id == $r->id)
                            selected
                        @endif
                        >{{$r->name}}</option>
                    @endforeach
                </select>

                @if($errors->has('restaurante_id'))
                    <span class="invalid-feedback">{{ $errors->first('restaurante_id') }}</span>
                @endif
            </p>

           
            <input type="submit" value="Atualizar" class="btn btn-success btn-lg" >

        </form>
    </div>

@endsection