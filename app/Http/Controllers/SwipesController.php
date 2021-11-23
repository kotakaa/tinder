<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Swipe;

class SwipesController extends Controller
{
    public function store(Request $request)
    {
        Swipe::create([
            'is_like' => $request['is_like'],
            'to_user_id' => $request['to_user_id'],
            'from_user_id' => \Auth::user()->id,
        ]);

        // 自分がlikeして　&& 相手もlikeしてくれていたら
        $isMatch = $request['is_like'] &&
        Swipe::where('from_user_id', $request['to_user_id'])
            ->where('to_user_id', \Auth::user()->id)
            ->where('is_like', true)
            ->exists();

        if ($isMatch){
            return redirect(route('users.index'))
                ->with('flash_message', 'マッチしました。');
        }
        return redirect(route('users.index'));
    }
}
