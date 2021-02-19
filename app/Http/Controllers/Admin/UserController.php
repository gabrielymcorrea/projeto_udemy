<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        //$users = User::all();
        $users = User::where('id', Auth::user()->id)->get();
        return view('admin.users.index', compact('users'));
    }

    public function new(){
        return view('admin.users.store');
    }

    public function store(UserRequest $request){
        $userData = ($request->all());

        $request ->validated();

        $userData['password'] = bcrypt($userData['password']);

        $user = new User();
        $user->create($userData);


        flash('Adicionado com sucesso!')->success();
        return redirect('admin\users');
    }

    public function edit(User $user){
        return view('admin.users.edit', compact('user'));
    }

    public function update(UserRequest $request, $id){
        $userData = ($request->all());

        $request ->validated();

        if($userData['password']){
            $userData['password'] = bcrypt($userData['password']);
        }

        $user = User::findOrFail($id);
        $user->update($userData);

        flash('Atualizado com sucesso!')->success();
        return redirect('admin\users');
    }

    public function delete($id){
        $user = User::findOrFail($id);
        $user->delete();

        flash('Removido com sucesso!')->success();
        return redirect('admin\users');
    }
}
