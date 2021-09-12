<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function show()
    {
        $user = User::find(1); // ユーザーID:1 のユーザー情報を取得して $user 変数に代入する
        dd($user); // $user を出力して処理をストップする

        return view('users.show');
    }
}
