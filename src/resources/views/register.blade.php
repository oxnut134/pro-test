@extends('layouts.header')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')

<body>
    <form class="register_form">
        <div class="register-form_container">
            <div class="register-form_title">
                <h2 class="register-form_register_logo">会員登録</h2>
            </div>
            <div class="register-form_input_title">
                <h3 class="register-form_input_title_logo">ユーザー名</h3>
            </div>
            <div class="register-form_input_box ">
                <input class="register-form_input_field" type="text">
            </div>
            <div class="register-form_input_title">
                <h3 class="register-form_input_title_logo">メールアドレス</h3>
            </div>
            <div class="register-form_input_box ">
                <input class="register-form_input_field" type="text">
            </div>
            <div class="register-form_input_title">
                <h3 class="register-form_input_title_logo">パスワード</h3>
            </div>
            <div class="register-form_input_box ">
                <input class="register-form_input_field" type="text">
            </div>
            <div class="register-form_input_title">
                <h3 class="register-form_input_title_logo">確認用パスワード</h3>
            </div>
            <div class="register-form_input_box ">
                <input class="register-form_input_field" type="text">
            </div>
            <div class="register-form_button_box">
                <button class="register-form_redirect_button">登録する</button>
            </div>
            <div class="login-form_link_box">
                <a class="login-form_link_to_register">ログインはこちら</a>
            </div>
        </div>
    </form>
</body>
@endsection
