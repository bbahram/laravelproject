<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Provider;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
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

            echo 'hi';
            $user->save();
        }

        return redirect('/');
    }









    public function register()
    {
        return view('authMine.register');
    }
    public function login()
    {
        return view('authMine.login');
    }
    public function rooms()
    {
        return view('rooms.rooms');
    }
    public function room()
    {
        return view('rooms.room');
    }
    public function users()
    {
        $providers = Provider::orderBy('id', 'DESC')->get();
        $customers = Customer::orderBy('id', 'DESC')->get();
        return view('users.users', compact('providers', 'customers'));
    }
}
