<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FollowController extends Controller
{
    public function follow($id)
    {
        $follow = new Follow();

        $follow->userId = session('userId');
        $follow->followUserId = $id;

        $follow->save();

        return Redirect::back();
    }

    public function unfollow($id)
    {
        Follow::where('followUserId', $id)
            ->where('userId', session('userId'))
            ->delete();

        return Redirect::back();
    }
}
