<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merchandise; // 商品モデル
use Illuminate\Support\Facades\Storage; // 画像保存用

class SellController extends Controller
{
    /**
     * 出品フォームを表示する
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * 商品情報を保存する
     */
    public function store(Request $request)
    {
        // バリデーションルール
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'condition' => 'required|string|in:良好,目立った傷や汚れなし,やや傷や汚れあり,状態が悪い',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|max:2048', // 画像ファイル
        ]);

        // 画像の保存処理
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public'); // `storage/app/public/images`に保存
        } else {
            $imagePath = null;
        }

        // 商品情報をデータベースに保存
        Merchandise::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'condition' => $validated['condition'],
            'price' => $validated['price'],
            'image_url' => $imagePath, // 保存した画像パス
            'user_id' => auth()->id(), // 出品者のIDを保存
        ]);

        // 保存完了後、リダイレクト
        return redirect()->route('home')->with('success', '商品が出品されました！');
    }
}

