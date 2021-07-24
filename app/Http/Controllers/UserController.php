<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(Request $request)
    {
        if ($request->get('password') == $request->get('psw-repeat')) {
            $user = new User([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => Hash::make($request->get('password')),
                'role' => $request->get('role'),
            ]);

            $user->save();
        }

        return redirect('/');
    }

    public function users()
    {
        $users = User::orderBy('id', 'DESC')->get();
        return view('users.users', compact('users'));
    }

    public function edit(User $user)
    {
        return view('users.userEdit', compact('user'));
    }
    public function update(Request $request, User $user)
    {
        if (empty($request->get('name'))) {
            $user->name = $user->name;
        } else {
            $user->name = $request->get('name');
        }

        if (empty($request->get('email'))) {
            $user->email = $user->email;
        } else {
            $user->email = $request->get('email');
        }

        if (empty($request->get('password'))) {
            $user->password = $user->password;
        } else {
            if ($request->get('password') == $request->get('psw-repeat')) {
                $user->password = Hash::make($request->get('password'));
            }
        }

        $user->role = $user->role;

        $user->save();
        
        return redirect('/');

        /*if (empty($request->get('password'))) {
            /*$user = new User([
                    'name' => $request->get('name'),
                    'email' => $request->get('email'),
                    'password' => $user->password,
                    'role'=>$user->role,
                ]);

            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->password = $user->password;
            $user->role = $user->role;

            $user->save();
        } else {
            if ($request->get('password') == $request->get('psw-repeat')) {
                $user = new User([
                    'name' => $request->get('name'),
                    'email' => $request->get('email'),
                    'password' => Hash::make($request->get('password')),
                    'role' => $user->role,
                ]);

                $user->save();
            }
        }*/
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect(route('users'));
    }
}
