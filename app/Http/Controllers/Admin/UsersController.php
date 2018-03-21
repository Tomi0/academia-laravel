<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{

    public function index()
    {
        $users = User::all();

        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/admin/user')->with('success', 'El usuario ha sido eliminado con exito');
    }

    public function verify(User $user)
    {
        $user->verified = 1;
        $user->update();

        return redirect()->route('admin.user')->with('success', 'Se ha verficado el usuario');

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->verified = 0;
        $user->save();

        return redirect()->route('admin.user.create')->with('success', 'El usuario ha sido creado con exito.');
    }

    public function update(Request $request, User $user)
    {
        if ($user->email != $request->email) {
            $this->validate($request, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users'
            ]);
            $user->email = $request->email;
        } else {
            $this->validate($request, [
                'name' => 'required|string|max:255'
            ]);
        }

        $user->name = $request->name;
        $user->verified = $request->verified;
        $user->update();

        return redirect()->route('admin.user')->with('success', 'El usuario ha sido editado correctamente');
    }

    public function edit(User $user)
    {
        return view('admin.user.update', compact('user'));
    }

}
