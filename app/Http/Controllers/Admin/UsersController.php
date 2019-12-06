<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use Gate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user, Role $role)
    {
        if(Gate::denies('edit-users')){
            return redirect()->route('admin.users.index');
        }

        $roles = Role::all();

        return view('admin.users.edit')->with([
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    public function update(Request $request, User $user)
    {
        $user->Roles()->sync($request->roles);

        $user->name = $request->name;
        $user->email = $request->email;

        if($user->save()) {
            $request->session()->flash('success', 'Usuário atualizado com sucesso!');
        } else {
            $request->session()->flash('danger', 'Usuário não pôde ser atualizado!');
        }
        return redirect()->route('admin.users.index');
    }

    public function destroy(User $user, Request $request)
    {
        if(Gate::denies('delete-users')){
            return redirect()->route('admin.users.index');
        }

        $user->roles()->detach();

        if($user->delete()) {
            $request->session()->flash('success', 'Usuário excluído com sucesso!');
        } else {
            $request->session()->flash('danger', 'Usuário não pôde ser excluído!');
        }

        return redirect()->route('admin.users.index');
    }
}
