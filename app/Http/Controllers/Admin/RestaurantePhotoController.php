<?php

namespace App\Http\Controllers\Admin;
use App\Models\Restaurante;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RestaurantePhotoController extends Controller
{
    public function index($id){
        $restaurante_id = $id;
        return view('admin.restaurantes.photos.index', compact('restaurante_id'));
    }

    public function save(Request $request, $id){
        foreach($request->file('photos') as $photo){
            $newName = sha1($photo->getClientOriginalName()) . uniqid() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('imagens'), $newName);
            $restaurante = Restaurante::find($id);
            $restaurante->photos()->create([
                'photo' => $newName
            ]);

            flash()->success('foto carregada com sucesso');
            return redirect()->route('restaurantes.photo', $id);
        }
    }
}
