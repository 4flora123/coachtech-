@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/register.css')}}">
@endsection

@section('content')
<div class="register-form">
  <div class="register-form__inner">
  <form action="/mypage/profile" method="post" enctype="multipart/form-data" class="register-form__form">
    <h2 class="register-form__heading content__heading">プロフィール設定</h2>
    @csrf
    @if(isset($profile))
        @method('PUT')
    @endif
  <main class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <form class="register-form__form" action="mypage/profile" method="POST" enctype="multipart/form-data">
          <div class="mb-3 text-center">
            <div class="profile-image-wrapper">
              <label for="profileImage" class="profile-label">
                <img src="" alt="プロフィール画像" class="profile-image"  id="previewImage"
                  style="display: none;">
            </div>
            <input type="file" id="profileImage" name="profile_image" accept="image/*" class="profile-image-label">
                  <button type="button" class="btn profile-picture-btn"
                    onclick="document.getElementById('profileImage').click()">画像を選択する</button>
          </div>

          <div class="register-form__group">
            <label class="register-form__label" for="name" class="form-label">ユーザー名</label>
            <input class="register-form__input" type="text" id="profile_name"name="profile_name"
              value="{{ isset($profile) ? $profile->profile_name : old('profile_name') }}">
          </div>

          <div class="register-form__group">
            <label class="register-form__label" for="postal" class="form-label">郵便番号</label>
            <input class="register-form__input" type="text" id="postal" name="postal"
              value="{{  isset($profile) ? $profile->postal : old('postal') }}">
          </div>

          <div class="register-form__group">
            <label class="register-form__label" for="address" class="form-label">住所</label>
            <input class="register-form__input" type="text" id="address" name="address"
              value="{{ isset($profile) ? $profile->address : old('address') }}">
          </div>

          <div class="register-form__group">
            <label class="register-form__label" for="building" class="form-label">建物名</label>
            <input class="register-form__input" type="text" id="building" name="building"
              value="{{ isset($profile) ? $profile->building : old('building') }}">
          </div>

          <div class="text-center">
            <button type="submit" class="btn profile-btn">
              {{ isset($profile) ? '更新する' : '保存する' }}
            </button>
          </div>
        </form>
      </div>
    </div>
  </main>

  <script>
    // プレビュー画像の表示
    document.getElementById('profileImage').addEventListener('change', function(event) {
      const reader = new FileReader();
      reader.onload = function(e) {
        document.getElementById('previewImage').src = e.target.result;
      }
      reader.readAsDataURL(event.target.files[0]);
    });
  </script>
</body>
</html>

@endsection