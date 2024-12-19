<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index(Request $request)
    {
          // 商品データを取得 (例: id=1 の商品)
        $merchandise = Merchandise::find($request->input('id')); // 仮に商品IDが1を取得

          // 現在ログインしているユーザーの配送先を取得
        $shippingAddress = ShippingAddress::where('user_id', auth()->id())->first();

          // データをビューに渡す
        return view('purchase.index', [
            'merchandise' => $merchandise,
            'shippingAddress' => $shippingAddress,
        ]);
    }

    public function conveniencePayment()
    {
    // Stripe APIのロジック
        return redirect()->away('https://stripe.com/...'); // 実際のリンクに置き換え
    }

    public function cardPayment()
    {
        // Stripe APIのロジック
        return redirect()->away('https://stripe.com/...'); // 実際のリンクに置き換え
    }
}
