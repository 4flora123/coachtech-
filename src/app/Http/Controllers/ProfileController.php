<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function setup()
{
    $user = auth()->user();
    $profile = $user->profile; // プロフィール情報を取得


    return view('mypage.profile', compact('profile'));
}

public function store(Request $request)
{

    $validated = $request->validate([
        'profil_name' => 'string|max:100',
        'postal' => 'nullable|string|max:8',
        'address' => 'nullable|string|max:100',
        'building' => 'nullable|string|max:100',
        'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $user = auth()->user();

    // プロフィールを新規作成
    $user->profile()->create($validated);

    // プロフィール画像の保存
    $filePath = null;
    if ($request->hasFile('profile_image')) {
        $filePath = $request->file('profile_image')->store('profile_images', 'public');
        $validated['profile_image_url'] = $filePath;
    }

    // プロフィール情報の保存
    $profile = new Profile();
    $profile->user_id = $user->id;
    $profile->profile_image_url = $filePath;
    $profile->profile_name = $request->profile_name;
    $profile->postal = $request->postal;
    $profile->address = $request->address;
    $profile->building = $request->building;
    $profile->save();

    // 初回ログインフラグをリセット
    $user->update(['is_first_login' => false]);

    return redirect('/')->with('success', 'プロフィール設定が完了しました！');
}

public function update(Request $request)
{
    $validated = $request->validate([
        'profil_name' => 'string|max:100',
        'postal' => 'nullable|string|max:8',
        'address' => 'nullable|string|max:100',
        'building' => 'nullable|string|max:100',
        'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $user = auth()->user();
    if (!$user) {
        return redirect()->route('login')->withErrors(['error' => 'ログインが必要です。']);
    }

    // プロフィールを更新
    $user->profile()->update($validated);

    return redirect()->route('mypage')->with('success', 'プロフィールが更新されました！');
}
}
