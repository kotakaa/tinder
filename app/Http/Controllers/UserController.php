<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Swipe;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = \Auth::user()->id;
        // 自分がswipeしたユーザーidを取得
        $swipedUserIds = Swipe::where('from_user_id', $userId)
            ->get()
            ->pluck('to_user_id');

        // 自分とswipeしたユーザーidを除いて取得
        $user = User::where('id', '<>', $userId)
            ->whereNotIn('id', $swipedUserIds)
            ->first();

        return view('users.index')
            ->with('user', $user);
    }

    public function match()
    {
        $userId = \Auth::user()->id;
        // 自分をlikeしてくれたユーザーの取得
        $likedUserId = Swipe::where('to_user_id', $userId)
            ->where('is_like', true)
            ->pluck('from_user_id');

        // お互いがlikeしているかどうか
        $matchedUsers = Swipe::where('from_user_id', $userId)
            ->whereIn('to_user_id', $likedUserId)
            ->where('is_like', true)
            ->get();
        return view('users.match')
            ->with('matchedUsers', $matchedUsers);
    }
}
