<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\PurchaseController;

Route::prefix('')->group(function () {
  Route::middleware('auth')->group(function () {
    Route::get('/', [ContactController::class, 'index'])->name('home');
    Route::get('/products/{id}', [ContactController::class, 'show'])->name('products.show');
    Route::get('/mypage', function () {return view('mypage');})->name('mypage');
    Route::get('/products/create', function () {return view('products.create');})->name('products.create');
    // 商品出品ページ表示
    Route::get('/sell', [SellController::class, 'create'])->name('sell');
    // 商品情報を保存
    Route::post('/products', [SellController::class, 'store'])->name('products.store');
    Route::get('/purchase/:item_id', [PurchaseController::class, 'setup']);
  });
});

Route::post('register', [ContactController::class, 'store']);

Route::prefix('/mypage/profile')->group(function () {
  Route::middleware(['auth'])->group(function () {
    // プロフィール設定画面のルート
    Route::get('', [ProfileController::class, 'setup'])->name('mypage.profile');
    // 初回ログイン時のプロフィール設定（POST）
    Route::post('', [ProfileController::class, 'store'])->name('mypage.profile');
    // 既存プロフィールの更新（PUT）
    Route::put('', [ProfileController::class, 'update'])->name('mypage.profile');
  });
});

