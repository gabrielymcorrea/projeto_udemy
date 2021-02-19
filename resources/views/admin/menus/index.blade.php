@extends('layouts.app')

@section('conteudo')
    <div class="container">
        <h1 class="float-left">Cardápio</h1>
        <a href="{{route('menu.new') }}" class="float-right btn btn-success">Novo</a>


        <table class="table table-striped">
            <div class="container">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Nome </th>
                    <th>Restaurante </th>
                    <th>Criado em </th>
                    <th>Ações </th>
                </tr>
                </thead>
                <body>
                    @foreach ($menus as $m)
                    <tr>
                        <td>{{ $m->id }}</td>
                        <td>{{ $m->name }}</td>
                        <td>{{ $m->restaurante->name }}</td>
                        <td>{{ $m->created_at }}</td>
                        <td>
                            <a href=" {{ route('menu.edit', $m) }} " class="btn btn-primary">EDITAR</a>
                            <a href=" {{ route('menu.remove', $m) }} " class="btn btn-danger">EXCLUIR</a>
                        </td>
                    </tr>
                    @endforeach
                </body>
            </div>
        </table>
    </div>
@endsection



