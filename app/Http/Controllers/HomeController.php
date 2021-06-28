<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        if(session('isLoggedIn') === true) {
            $messages = Message::where('isDeleted', 0)
                ->orderBy('created_at', 'desc')
                ->get();

            return view('home', [
                'messages' => $messages
            ]);
        }

        return view('signin');

    }

    public function signIn()
    {
        return view('signIn');
    }

    public function register()
    {
        return view('register');
    }
}
