@extends('layouts.header')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')

<body>
    <form class="login_form">
        <div class="login-form_container">
            <div class="login-form_title">
                <h2 class="login-form_login_logo">ログイン</h2>
            </div>
            <div class="login-form_input_title">
                <h3 class="login-form_input_title_logo">メールアドレス</h3>
            </div>

            <div class="login-form_input_box ">
                <input class="login-form_input_field" type="email">
            </div>
            <div class="login-form_input_title">
                <h3 class="login-form_input_title_logo">パスワード</h3>
            </div>
            <div class="login-form_input_box ">
                <input class="login-form_input_field" type="password">
            </div>
            <div class="login-form_button_box">
                <button class="login-form_login_button">ログインする</button>
            </div>
            <div class="login-form_link_box">
                <a class="login-form_link_to_register">会員登録はこちら</a>
            </div>
        </div>
    </form>
</body>
@endsection
