@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/register.css')}}">
@endsection

@section('content')
<div class="register-form">

  <div class="register-form__inner">
    <form class="register-form__form" action="/register" method="post">
    <h2 class="register-form__heading content__heading">会員登録</h2>
      @csrf
      <div class="register-form__group">
        <label class="register-form__label" for="name">ユーザ名</label>
        <input class="register-form__input" type="text" name="name" id="name" placeholder=""
          value="{{ old('name') }}">
        <p class="register-form__error-message">
          @error('name')
          {{ $message }}
          @enderror
        </p>
      </div>

      <div class="register-form__group">
        <label class="register-form__label" for="email">メールアドレス</label>
        <input class="register-form__input" type="mail" name="email" id="email" placeholder=""
          value="{{ old('email') }}">
        <p class="register-form__error-message">
          @error('email')
          {{ $message }}
          @enderror
        </p>
      </div>

      <div class="register-form__group">
        <label class="register-form__label" for="password">パスワード</label>
        <input class="register-form__input" type="password" name="password" id="password" placeholder=""
          value="{{ old('password') }}">
        <p class="register-form__error-message">
          @error('password')
          {{ $message }}
          @enderror
        </p>
      </div>

      <div class="register-form__group">
        <label class="register-form__label" for="password_confirmation">確認パスワード</label>
        <input class="register-form__input" type="password" name="password_confirmation"
          id="password_confirmation" placeholder="" value="{{ old('password_confirmation') }}">
        <p class="register-form__error-message">
          @error('password_confirmation')
          {{ $message }}
          @enderror
        </p>
      </div>

      <input class="register-form__btn btn" type="submit" value="登録">
      <a href="/login"class="login-form__registration">ログインはこちら</a>
    </form>
  </div>
</div>
@endsection('content')