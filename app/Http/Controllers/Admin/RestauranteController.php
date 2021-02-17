<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurante;
use App\Http\Requests\RestauranteRequest;


class RestauranteController extends Controller
{
    public function index(){
        $restaurantes = Restaurante::all();
        return view('admin.restaurantes.index', compact('restaurantes'));
    }

    public function new(){
        return view('admin.restaurantes.store');
    }

    public function store(RestauranteRequest $request){
        $restauranteData = ($request->all());

        $request ->validated();

        $restaurante = new Restaurante();
        $restaurante->create($restauranteData);

        return redirect('admin\restaurantes')->with('msg', 'Criado com sucesso!');


    }

    public function edit(Restaurante $restaurante){
        //dd($id);

        return view('admin.restaurantes.edit', compact('restaurante'));
    }

    public function update(RestauranteRequest $request, $id){
        $restauranteData = ($request->all());

        $request ->validated();

        $restaurante = Restaurante::findOrFail($id);
        $restaurante->update($restauranteData);

        return redirect('admin\restaurantes')->with('msg', 'Atualizado com sucesso!');
    }

    public function delete($id){
        $restaurante = Restaurante::findOrFail($id);
        $restaurante->delete();

        print 'delete';
    }
}