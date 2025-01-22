@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contact.css')}}">
@endsection

@section('content')

<nav class="nav">
        <a href="#" class="nav-link">おすすめ</a>
        <a href="#" class="nav-link active">マイリスト</a>
    </nav>

    <main class="main">
        <div class="product-list">
            @forelse($merchandises as $merchandise)
                <div class="product-card">
                    <a href="{{ route('products.show', $merchandise->id) }}">
                        <img src="{{ asset('storage/' . $merchandise->image_url) }}" alt="商品画像" class="product-image">
                        <p class="product-name">{{ $merchandise->name }}</p>
                    </a>
                </div>
            @empty
                <p>商品が見つかりません。</p>
            @endforelse
        </div>
    </main>
</html>