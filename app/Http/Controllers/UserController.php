<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\Message;
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

        $request->session()->put('isLoggedIn', true);
        $request->session()->put('userName', $user->name);
        $request->session()->put('userId', $user->id);

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

    public function view($id)
    {
        $user = User::where('id', $id)
            ->firstOrFail();

        $messages = Message::where('postedById', $id)
            ->orderBy('created_at', 'desc')
            ->get();

        $follows = Follow::where('followUserId', $id)
            ->get();

        $followers = [];

        foreach($follows as $follow)
        {
            $followers[$follow->userId] = $follow->followUserId;
        }

        return view('user', [
            "user" => $user,
            "messages" => $messages,
            "followers" => $followers
        ]);
    }

    public function followers($id)
    {

        $user = User::where('id', $id)
            ->firstOrFail();

        $users = Follow::select('users.id', 'follows.followUserId', 'follows.created_at', 'users.name', 'users.email')
            ->join('users', 'follows.userId', '=', 'users.id')
            ->where('followUserId', $id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('followers', [
            "user" => $user,
            "followers" => $users
        ]);
    }
}
