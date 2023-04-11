<?php

namespace App\Http\Controllers;

use App\Models\Sub;
use App\Models\User;
use Illuminate\Http\Request;

class SubController extends Controller
{
    public function sub(User $user, Request $request)
    {
//        dd(auth()->user()->subs);
        $res = Sub::create(['user_id'=>$user->id, 'sub_id'=>auth()->id(), 'period'=>$request->period]);
        return $res ? to_route('user.profile', $user->id)->with(['success'=>'Подписка успешно оформлена']) : to_route('user.profile', $user->id)->withErrors(['error'=>'Возникла ошибка при оформлении. Попробуйте позже.']);
    }

    public function unsub(User $user)
    {
        $res = Sub::where(['user_id'=>$user->id, 'sub_id'=>auth()->id()])->delete();
        return $res ? to_route('user.profile', $user->id)->with(['success'=>'Подписка отменена']) : to_route('user.profile', $user->id)->withErrors(['error'=>'Невозможно отменить подписку']);
    }
}
