<h1>Edição de Restaurante </h1>
<hr>

<form action="{{ route('restaurantes.update', $restaurante) }}" method="post">
    {{ csrf_field() }}
    <p>
        <label> Nome do Restaurante </label> <br>
        <input type="text" name="name" value="{{$restaurante->name}}">
        @if($errors->has('name'))
            {{ $errors->first('name') }}
        @endif
    </p>

    <p>
        <label> Endereço </label> <br>
        <input type="text" name="address" value="{{$restaurante->address}}">
        @if($errors->has('address'))
            {{ $errors->first('address') }}
         @endif
    </p>

    <p>
        <label> Fale sobre o Restaurante </label> <br>
        <textarea name="description" id="" cols="30" rows="10">{{$restaurante->description}}</textarea>
        @if($errors->has('description'))
            {{$errors->first('description')}}
         @endif
    </p>

    <input type="submit" value="Atualizar" >

</form>
