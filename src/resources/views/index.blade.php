@extends('layouts.header')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')

<body>
    <div class="index-form_mode_change_button_box">
        <a class="index-form_mode_recommend_button">おすすめ</a>
        <a class="index-form_mode_mypage_button">マイリスト</a>
    </div>
    <div class="index-form_image_box">
        <div class="index-form_image_wrapper">
            <img class="index-form_image_attribute" src="{{asset('storage/Armani+Mens+Clock.jpg')}}">
            <div>商品名</div>
        </div>
        <div class="index-form_image_wrapper">
            <img class="index-form_image_attribute" src="{{asset('storage/Armani+Mens+Clock.jpg')}}">
            <div>商品名</div>
        </div>
        <div class="index-form_image_wrapper">
            <img class="index-form_image_attribute" src="{{asset('storage/Armani+Mens+Clock.jpg')}}">
            <div>商品名</div>
        </div>
        <div class="index-form_image_wrapper">
            <img class="index-form_image_attribute" src="{{asset('storage/Armani+Mens+Clock.jpg')}}">
            <div>商品名</div>
        </div>
        <div class="index-form_image_wrapper">
            <img class="index-form_image_attribute" src="{{asset('storage/Armani+Mens+Clock.jpg')}}">
            <div>商品名</div>
        </div>
        <div class="index-form_image_wrapper">
            <img class="index-form_image_attribute" src="{{asset('storage/Armani+Mens+Clock.jpg')}}">
            <div>商品名</div>
        </div>
        <div class="index-form_image_wrapper">
            <img class="index-form_image_attribute" src="{{asset('storage/Armani+Mens+Clock.jpg')}}">
            <div>商品名</div>
        </div>
    </div>


</body>

@endsection
