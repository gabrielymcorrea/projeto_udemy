<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <title>Restaurante</title>
</head>

    <body>
        <h1>Inserção de Restaurante </h1>
    <hr>
    <form action="{{ route('restaurantes.store') }}" method="post" class="table table-striped">
        {{ csrf_field() }}
        <p>
            <label> Nome do Restaurante </label> <br>
            <input type="text" name="name" value="{{ old('name') }}"> <br>
            @if($errors->has('name'))
                {{ $errors->first('name') }}
        
            @endif
        </p>

        <p>
            <label> Endereço </label> <br>
            <input type="text" name="address" value="{{old('address')}}"><br>
            @if($errors->has('address'))
                {{ $errors->first('address') }}
            @endif
        </p>

        <p>
            <label> Fale sobre o Restaurante </label> <br>
            <textarea name="description" id="" cols="30" rows="10"> {{old('description')}}</textarea><br>
            @if($errors->has('description'))
                {{$errors->first('description')}}
            @endif
        </p>

        <input type="submit" value="Cadastrar">

    </form>
</body>
</html>


