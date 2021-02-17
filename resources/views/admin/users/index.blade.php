@extends('layouts.app')

@section('conteudo')
    <div class="container">
        <h1 class="float-left">Usuários </h1>
        <a href="{{route('user.new') }}" class="float-right btn btn-success">Novo</a>


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
                    @foreach ($users as $u)
                    <tr>
                        <td>{{ $u->id }}</td>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->created_at }}</td>
                        <td>
                            <a href=" {{ route('user.edit', $u) }} " class="btn btn-primary">EDITAR</a>
                            <a href=" {{ route('user.remove', $u) }} " class="btn btn-danger">EXCLUIR</a>
                        </td>
                    </tr>
                    @endforeach
                </body>
            </div>
        </table>
    </div>
@endsection



