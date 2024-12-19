<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Category;
use App\Models\Contact;
use App\Models\User;
use App\Models\Merchandise;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Date;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $merchandises = Merchandise::all(); // 商品情報を取得

          // 検索機能：商品名とブランド名で検索
        $query = Merchandise::query();

        if ($search = $request->input('search')) {
            $query->where('merchandise_name', 'like', '%' . $search . '%')
                ->orWhere('brand', 'like', '%' . $search . '%');
        }

        // 商品一覧取得
        $merchandises = $query->orderBy('created_at', 'desc')->get();

        return view('contact', compact('merchandises'));
    }

    public function store(RegisterRequest $request)
    {
    // ユーザーの作成
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    Auth::login($user);

        return redirect()->route('mypage.profile')->with('success', '会員登録が完了しました！');
    }

    public function show($id)
    {
        $merchandise = Merchandise::findOrFail($id);
        return view('products.show', compact('merchandise'));
    }
}

