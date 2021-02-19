<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Restaurante;
use App\Http\Requests\RestauranteRequest;
use Illuminate\Support\Facades\Auth;

class RestauranteController extends Controller
{
    public function index(){

        //$restaurantes = Restaurante::where('owner_id',  Auth::user()->id)->get();
        $restaurantes = Auth::user()->restaurantes;
        return view('admin.restaurantes.index', compact('restaurantes'));
    }

    public function new(){
        return view('admin.restaurantes.store');
    }

    public function store(RestauranteRequest $request){
        $restauranteData = $request->all();

        $request ->validated();

        $user=Auth::user();
        $user->restaurantes()->create($restauranteData);
    

        flash('Restaurante criado com sucesso')->success();
        return redirect('admin\restaurantes');

    }

    public function edit(Restaurante $restaurante){
        //dd($id);

        return view('admin.restaurantes.edit', compact('restaurante'));
    }

    public function update(RestauranteRequest $request, $id){
        $restauranteData = $request->all();

        $request ->validated();

        $restaurante = Restaurante::findOrFail($id);
        $restaurante->update($restauranteData);

        flash('Atualizado com sucesso!')->success();
        return redirect('admin\restaurantes');
    }

    public function delete($id){
        $restaurante = Restaurante::findOrFail($id);
        $restaurante->delete();

        flash('Removido com sucesso!')->success();
        return redirect('admin\restaurantes');
    }
}