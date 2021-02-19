<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12">
                <h1 class="m-1">{{$id->name}}</h1>
                <p class="lead m-1" > {{$id->description}}</p>
                <p class="m-1">
                    <address class="m-1"> Endereço: {{$id->address}}</address>
                </p>
            </div>
            <div class="col-12" >
                <p class="ml-1">Cardapio:</p>
                <ul class="list-group">
                    @foreach($id->menus as $m)
                        <li class="list-group-item">
                            {{$m->name}}
                            R$ {{number_format($m->preco, '2',',','.')}}
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-12">
                <h4 class="m-1">Fotos</h4>
                <hr>
            </div>
            <div class="row">
                @if($id->photos()->count())
                    @foreach($id->photos as $photo)
                        <div class="col-4">
                            <img src="{{asset('/imagens/' . $photo->photo)}}" alt="" class="img-fluid" >
                        </div>
                    @endforeach
                @else
                    <span class="alert alert-warning m-2">Sem fotos</span>
                @endif
            </div>
        </div>
    </x-slot>
</x-app-layout>
