<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    public function create(Request $request)
    {
        $message = new Message();

        $message->body =  $request->body;
        $message->postedBy =  $request->session()->get('userName');

        $message->save();

        return redirect('/');
    }

    public function view($id)
    {
        $message = Message::findOrFail($id);

        return view('message', [
            'message' => $message
        ]);
    }

    public function delete($id)
    {
        $message = Message::findOrFail($id);

        $message->isDeleted = 1;
        $message->save();

        return redirect('/');
    }
}
