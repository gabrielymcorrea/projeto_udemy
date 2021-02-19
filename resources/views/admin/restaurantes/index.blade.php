@extends('layouts.app')

@section('conteudo')
    <div class="container">
        <h1 class="float-left">Restaurantes</h1>
        <a href="{{route('restaurantes.new') }}" class="float-right btn btn-success">Novo</a>


        <table class="table table-striped">
            <div class="container">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nome </th>
                    <th>Criado em </th>
                    <th>Ações </th>
                </tr>
                </thead>
                <body>
                    @foreach ($restaurantes as $r)
                    <tr>
                        <td>{{ $r->id }}</td>
                        <td>{{ $r->name }}</td>
                        <td>{{ $r->created_at }}</td>
                        <td>
                            <a href=" {{ route('restaurantes.edit', $r) }} " class="btn btn-primary">EDITAR</a>
                            <a href=" {{ route('restaurantes.photo', ['id' => $r->id]) }} " class="btn btn-warning">FOTOS</a>
                            <a href=" {{ route('restaurantes.remove', $r) }} " class="btn btn-danger">EXCLUIR</a>
                        </td>
                    </tr>
                    @endforeach
                </body>
            </div>
        </table>
    </div>
@endsection



