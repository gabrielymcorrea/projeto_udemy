
<h1>Restaurantes</h1>
<a href="{{route('restaurantes.new') }}">Novo</a>
<hr>


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
                <td>{{ $r->create_alt }}</td>
                <td>
                    <a href=" {{ route('restaurantes.edit', $r) }} ">EDITAR</a>
                    <a href=" {{ route('restaurantes.remove', $r) }} ">EXCLUIR</a>
                </td>
            </tr>
            @endforeach
        </body>
    </div>
</table>

