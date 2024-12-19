@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css')}}">
@endsection

@section('content')
<body>
    <header class="header">
        <img src="{{ asset('images/logo.jpg') }}" class="header__logo" alt="COACHTECH">
        <form class="search-form" action="{{ route('home') }}" method="GET">
            <input class="search-input" type="text" name="query" placeholder="なにをお探しですか？">
        </form>
        <div class="header-buttons">
            <a href="{{ route('logout') }}" class="header__link">ログアウト</a>
            <a href="{{ route('mypage') }}" class="header__link">マイページ</a>
            <a href="{{ route('products.create') }}" class="header__link">出品</a>
        </div>
    </header>

    <main>
        <h1 class="title">商品の出品</h1>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="product-form">
            @csrf

            <!-- 商品画像 -->
            <div class="form-group">
                <label for="image">商品画像</label>
                <div class="image-input">
                    <input type="file" name="image" id="image" required>
                </div>
            </div>

            <!-- カテゴリー選択 -->
            <div class="form-group">
                <label>カテゴリー</label>
                <div class="categories">
                    <span class="category">ファッション</span>
                    <span class="category">家電</span>
                    <span class="category">インテリア</span>
                    <span class="category">レディース</span>
                    <span class="category">メンズ</span>
                    <span class="category">コスメ</span>
                    <span class="category">本</span>
                    <span class="category">ゲーム</span>
                    <span class="category">スポーツ</span>
                    <span class="category">キッチン</span>
                    <span class="category">ハンドメイド</span>
                    <span class="category">アクセサリー</span>
                    <span class="category">おもちゃ</span>
                    <span class="category">ベビー・キッズ</span>
                </div>
            </div>

            <!-- 状態選択 -->
            <div class="form-group">
                <label for="condition">商品の状態</label>
                <select name="condition" id="condition" required>
                    <option value="" disabled selected>選択してください</option>
                    <option value="良好">良好</option>
                    <option value="目立った傷や汚れなし">目立った傷や汚れなし</option>
                    <option value="やや傷や汚れあり">やや傷や汚れあり</option>
                    <option value="状態が悪い">状態が悪い</option>
                </select>
            </div>

            <!-- 商品名と説明 -->
            <div class="form-group">
                <label for="name">商品名</label>
                <input type="text" name="name" id="name" required>
            </div>

            <div class="form-group">
                <label for="description">商品の説明</label>
                <textarea name="description" id="description" rows="5" required></textarea>
            </div>

            <!-- 販売価格 -->
            <div class="form-group">
                <label for="price">販売価格</label>
                <div class="price-input">
                    <span>¥</span>
                    <input type="number" name="price" id="price" min="0" required>
                </div>
            </div>

            <!-- 送信ボタン -->
            <button type="submit" class="submit-button">出品する</button>
        </form>
    </main>
</body>
</html>