@extends('layouts.header')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')

<body>
    <div class="mypage-form_user_profile_box">
            <div class="mypage-form_user_picture_wrapper">
                <img class="mypage-form_user_picture" src="{{asset('storage/Armani+Mens+Clock.jpg')}}">
                <div class="mypage-form_user_name">ユーザー名</div>
            </div>
            <button class="mypage-form_edit_profile_button">
                プロフィールを編集
            </button>
    </div>
    <div class="mypage-form_mode_change_button_box">
        <a class="mypage-form_mode_exhibited_item_button">出品した商品</a>
        <a class="mypage-form_mode_purchased_item_button">購入した商品</a>
    </div>
    <div class="mypage-form_image_box">
        <div class="mypage-form_image_wrapper">
            <img class="mypage-form_image_attribute" src="{{asset('storage/Armani+Mens+Clock.jpg')}}">
            <div>商品名</div>
        </div>
        <div class="mypage-form_image_wrapper">
            <img class="mypage-form_image_attribute" src="{{asset('storage/Armani+Mens+Clock.jpg')}}">
            <div>商品名</div>
        </div>
        <div class="mypage-form_image_wrapper">
            <img class="mypage-form_image_attribute" src="{{asset('storage/Armani+Mens+Clock.jpg')}}">
            <div>商品名</div>
        </div>
        <div class="mypage-form_image_wrapper">
            <img class="mypage-form_image_attribute" src="{{asset('storage/Armani+Mens+Clock.jpg')}}">
            <div>商品名</div>
        </div>
        <div class="mypage-form_image_wrapper">
            <img class="mypage-form_image_attribute" src="{{asset('storage/Armani+Mens+Clock.jpg')}}">
            <div>商品名</div>
        </div>
        <div class="mypage-form_image_wrapper">
            <img class="mypage-form_image_attribute" src="{{asset('storage/Armani+Mens+Clock.jpg')}}">
            <div>商品名</div>
        </div>
        <div class="mypage-form_image_wrapper">
            <img class="mypage-form_image_attribute" src="{{asset('storage/Armani+Mens+Clock.jpg')}}">
            <div>商品名</div>
        </div>
    </div>


</body>

@endsection
