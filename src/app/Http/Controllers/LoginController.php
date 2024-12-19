<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticated(Request $request, $user)
    {
        if ($user->is_first_login) {
            $user->update(['is_first_login' => false]);  // フラグをリセット
            return redirect()->route('/mypage/profile');// 初回ログイン用ページへリダイレクト
        }
        return redirect()->route('home');
    }
}
