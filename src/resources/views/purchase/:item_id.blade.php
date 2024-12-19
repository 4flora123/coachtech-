@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/purchase.css')}}">
@endsection

@section('content')
<body>
    <div class="container">
        <header class="header">
            <h1>購入画面</h1>
        </header>
        <main class="main-content">
            <div class="product-details">
                <img id="product-image" src="" alt="商品画像" class="product-image">
                <h2 id="product-name" class="product-name">商品名</h2>
                <p id="product-price" class="product-price">¥0</p>
                <label for="payment-method">支払い方法</label>
                <select id="payment-method" class="payment-select">
                    <option value="コンビニ支払い">コンビニ支払い</option>
                    <option value="カード支払い">カード支払い</option>
                </select>
                <p class="shipping-info">
                    <span>配送先</span>
                    <span id="shipping-address">
                        〒000-0000<br>
                        配送先の住所
                    </span>
                    <a href="#" class="edit-link">変更する</a>
                </p>
            </div>
            <div class="summary">
                <h3>注文内容</h3>
                <p>商品代金: <span id="summary-price">¥0</span></p>
                <p>支払い方法: <span id="selected-method">コンビニ支払い</span></p>
                <button id="purchase-btn" class="purchase-button">購入する</button>
            </div>
        </main>
    </div>

    <script src="script.js">
      // テーブルデータをモック
      const merchandise = {
        name: "商品名サンプル",image: "https://via.placeholder.com/300",
        price: 47000
      };

      const shippingAddress = {
        postal: "XXX-YYYY",address: "配送先住所のサンプル",building: "建物名サンプル"
      };

        // 初期データのレンダリング
      document.getElementById('product-name').textContent = merchandise.name;
      document.getElementById('product-image').src = merchandise.image;
      document.getElementById('product-price').textContent = `¥${merchandise.price.toLocaleString()}`;
      document.getElementById('summary-price').textContent = `¥${merchandise.price.toLocaleString()}`;
      document.getElementById('shipping-address').innerHTML = `
        〒${shippingAddress.postal}<br>
        ${shippingAddress.address}<br>
        ${shippingAddress.building}`;

        // 支払い方法の選択変更時の処理
      document.getElementById('payment-method').addEventListener('change', function () {
        const selectedMethod = this.value;
      document.getElementById('selected-method').textContent = selectedMethod;
      });

        // 購入ボタンのクリックイベント
      document.getElementById('purchase-btn').addEventListener('click', function () {
        const selectedMethod = document.getElementById('payment-method').value;

        if (selectedMethod === 'コンビニ支払い') {
          // Stripeのコンビニ支払い用ページにリダイレクト
          window.location.href = '/stripe/convenience-payment';
          } else if (selectedMethod === 'カード支払い') {
          // Stripeのカード支払い用ページにリダイレクト
          window.location.href = '/stripe/card-payment';
        }
      });
    </script>
</body>
</html>
