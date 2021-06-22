<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function create(Request $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();

        return redirect('/');
    }

    public function login(Request $request)
    {
        $user = User::where('name', '=', $request->name)->firstOrFail();

        if ($user->password === $request->password) {
            $request->session()->put('isLoggedIn', true);
            $request->session()->put('userName', $user->name);
            $request->session()->put('userId', $user->id);
        }

        return redirect('/');
    }

    public function logout(Request $request)
    {
        $request->session()->put('isLoggedIn', false);
        $request->session()->forget('userName');
        $request->session()->forget('userId');

        return redirect('/');
    }


}
