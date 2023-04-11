<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Sub;
use Illuminate\Http\Request;

class SubController extends Controller
{
    public function index(){
        return view('admin.subs', ['subs'=>Sub::latest()->get()]);
    }

    public function delete(Sub $sub){
        $res = $sub->delete();
        return $res? back()->with(['success'=>'Подписка успешно отменена']):back()->withErrors(['error'=>'Не удалось отменить подписку']);
    }
}
