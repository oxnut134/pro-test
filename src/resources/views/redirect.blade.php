@extends('layouts.header')

@section('css')
<link rel="stylesheet" href="{{ asset('css/redirect.css') }}">
@endsection

@section('content')

<body>
    <form class="redirect_form">
        <div class="redirect-form_container">
            <div class="redirect-form_title">
                <h2 class="redirect-form_redirect_logo">住所の変更</h2>
            </div>
            <div class="redirect-form_input_title">
                <h3 class="redirect-form_input_title_logo">郵便番号</h3>
            </div>
            <div class="redirect-form_input_box ">
                <input class="redirect-form_input_field" type="text">
            </div>
            <div class="redirect-form_input_title">
                <h3 class="redirect-form_input_title_logo">住所</h3>
            </div>
            <div class="redirect-form_input_box ">
                <input class="redirect-form_input_field" type="text">
            </div>
            <div class="redirect-form_input_title">
                <h3 class="redirect-form_input_title_logo">建物名</h3>
            </div>
            <div class="redirect-form_input_box ">
                <input class="redirect-form_input_field" type="text">
            </div>
            <div class="redirect-form_button_box">
                <button class="redirect-form_redirect_button">更新する</button>
            </div>
        </div>
    </form>
</body>
@endsection
