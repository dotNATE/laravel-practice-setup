<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(Request $request)
    {
        $message = null;
        $errors = [];
        $fields = ['name', 'email' , 'password'];
        $values = [];

        foreach ($fields as $field) {
            if (empty($request->$field)) {
                $errors[] = $field;
            } else {
                $values[$field] = $request->$field;
            }
        }

        if ($request->password !== $request->passwordConf) {
            $message = 'Your passwords do not match';
        }

        if (count($errors) > 0 || $message !== null) {
            return view('/register', [
                "message" => $message,
                "errors" => $errors
            ]);
        }

        $user = new User();

        $user->name = $values['name'];
        $user->email = $values['email'];
        $user->password = password_hash($values['password'], PASSWORD_BCRYPT);

        $user->save();

        $request->session()->put('isLoggedIn', true);
        $request->session()->put('userName', $user->name);
        $request->session()->put('userId', $user->id);

        mail($user->email, 'Knitter Signup Confirmation', 'Thank you, ' . $user->name . ' for signing up to Knitter!');

        return redirect('/');
    }

    public function login(Request $request)
    {
        $user = User::where('name', '=', $request->name)->firstOrFail();

        if (password_verify($request->password, $user->password)) {
            $request->session()->put('isLoggedIn', true);
            $request->session()->put('userName', $user->name);
            $request->session()->put('userId', $user->id);
            return redirect('/');
        }

        return view('/signIn', [
            "message" => 'Provided password is incorrect'
        ]);
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

        $followers = [];
        $following = [];

        $user = User::where('id', $id)
            ->firstOrFail();

        $messages = Message::where('postedById', $id)
            ->orderBy('created_at', 'desc')
            ->get();

        $followerIds = Follow::where('followUserId', $id)
            ->get();

        $followingIds = Follow::where('userId', $id)
            ->get();

        foreach($followerIds as $followerId)
        {
            $followers[$followerId->userId] = $followerId->followUserId;
        }

        foreach($followingIds as $followingId)
        {
            $following[$followingId->followUserId] = $followingId->followUserId;
        }

        return view('user', [
            "user" => $user,
            "messages" => $messages,
            "followers" => $followers,
            "following" => $following
        ]);
    }

    public function followers($id)
    {

        $user = User::where('id', $id)
            ->firstOrFail();

        $followers = Follow::select('users.id', 'follows.followUserId', 'follows.created_at', 'users.name')
            ->join('users', 'follows.userId', '=', 'users.id')
            ->where('followUserId', $id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('followers', [
            "user" => $user,
            "followers" => $followers
        ]);
    }

    public function following($id)
    {

        $user = User::where('id', $id)
            ->firstOrFail();

        $following = Follow::select('follows.followUserId', 'follows.created_at', 'users.name')
            ->join('users', 'follows.followUserId', '=', 'users.id')
            ->where('userId', $id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('following', [
            "user" => $user,
            "following" => $following
        ]);
    }
}
