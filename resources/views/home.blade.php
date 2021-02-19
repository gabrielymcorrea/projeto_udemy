<x-app-layout>
    <x-slot name="header">
        <h1>Restaurantes</h1>
        <hr>
        <div class="row">
            @foreach($restaurantes as $r)
            <div class="col-3">
                <h2><a href="{{route('home.single', ['id' =>$r->id])}}" class="btn btn-primary ">{{$r->name}}</a></h2>
                <p>{{\Illuminate\Support\Str::limit($r->description,200)}}</p>
            </div>
            @endforeach
        </div>
    </x-slot>
</x-app-layout>
