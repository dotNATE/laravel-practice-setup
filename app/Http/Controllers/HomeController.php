<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {

        $messages = Message::where('isDeleted', 0)
                                ->orderBy('created_at', 'desc')
                                ->get();

        return view('home', [
            'messages' => $messages
        ]);
    }

}
