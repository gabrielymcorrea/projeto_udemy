<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Http\Requests\MenuRequest;
use App\Models\Restaurante;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function index(){
        $restaurantes = Auth::user()->restaurantes()->select('id')->get();
        $menus= Menu::whereIn('restaurante_id', $restaurantes)->get();
        return view('admin.menus.index', compact('menus'));
    }

    public function new(){
        $restaurantes = Auth::user()->restaurantes;
        return view('admin.menus.store', compact('restaurantes'));
    }

    public function store(MenuRequest $request){
        $menuData = ($request->all());
        $request ->validated();
        
    
        $restaurante = Restaurante::find($menuData['restaurante_id']);
        $restaurante->menus()->create($menuData);

        flash('Adicionado com sucesso!')->success();
        return redirect('admin\menus');
    }

    public function edit(Menu $menu){
        $restaurantes = Auth::user()->restaurantes;
        return view('admin.menus.edit', compact('menu', 'restaurantes'));
    }

    public function update(MenuRequest $request, $id){
        $menuData = $request->all();

        $request ->validated();

        $menu = Menu::find($id);
        $menu->restaurante()->associate($menuData['restaurante_id']);
        $menu->update($menuData);


        flash('Atualizado com sucesso!')->success();
        return redirect('admin\menus');

  
    }

    public function delete($id){
        $menu = Menu::findOrFail($id);
        $menu->delete();

        flash('Removido com sucesso!')->success();
        return redirect('admin\menus');
    }
}