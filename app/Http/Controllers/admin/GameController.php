<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index($user_id = null){
        return view('admin.games', ['games'=>$user_id?Game::where('user_id', $user_id)->orderBy('count_likes', 'desc')->latest()->get():Game::orderBy('count_likes', 'desc')->latest()->get(), 'user'=>$user_id?User::find($user_id)->username:null]);
    }
    public function ban(Game $game){
        $res = $game->update(['baned'=>true]);
        if ($res){
            Notification::create(['user_id'=>$game->user_id, 'message'=>"Ваша игра $game->name была заблокирована из-за большого количество жалоб."]);
        }
        return $res? back()->with(['success'=>'Игра успешно заблокирована']):back()->withErrors(['error'=>'Произошла ошибка, блокировка не удалась']);
    }
    public function unban(Game $game){
        $res = $game->update(['baned'=>false]);
        if ($res){
            Notification::create(['user_id'=>$game->user_id, 'message'=>"Ваша игра $game->name была разблокирована."]);
        }
        return $res? back()->with(['success'=>'Игра успешно разблокирована']):back()->withErrors(['error'=>'Произошла ошибка, блокировка не удалась']);
    }

}
