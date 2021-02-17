<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
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

        print 'usuario add com sucesso';

        //dd($request->all());
    }

    public function edit(User $user){
        //dd($id);

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

        print 'usuario atualizado';
    }

    public function delete($id){
        $user = User::findOrFail($id);
        $user->delete();

        print 'usuario removido com sucesso';
    }
}