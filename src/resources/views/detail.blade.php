@extends('layouts.header')

@section('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')

<body>
    <div class="detail-form">
        <div class="detail-form_Item_image">
            <img class="detail-form_image_attribute" src="{{asset('storage/Armani+Mens+Clock.jpg')}}">

        </div>
        <div class="detail-form_detail_descriptions">
            <h1 class="detail-form_item_name">商品名がここに入る</h1>
            <div class="detail-form_brand_name">ブランド名</div>
            <div class="detail-form_item_price
            _wrapper">
                <span class="detail-form_item_price">￥</span><span class="detail-form_item_price">47,000</span><span class="detail-form_item_price_tax">（税込）</span>
            </div>
            <div class="detail-form_engagement_image_box">
                <div class="detail-form_engagement_image_wrapper">
                    <img class="detail-form_engagement_image" src="{{asset('storage/like.png')}}">
                    <div class="detail-form_engagement_count">3</div>
                </div>
                <div class="detail-form_engagement_image_wrapper">
                    <img class="detail-form_engagement_image" src="{{asset('storage/comment.png')}}">
                    <div class="detail-form_engagement_count">3</div>
                </div>
            </div>
            <button class="detail-form_button_to_purchase_step">購入手続きへ</button>
            <h2>商品説明</h2>
            <p>カラー：グレー<br>
                新品<br>
                商品の状態は良好です。傷もありません。<br>
                購入後即発送いたします。</p>
            <h2>商品の情報</h2>
            <div class="detail-form_Item_category_box">
                <span class="detail-form_Item_category_column_name">カテゴリー</span>
                <div class="detail-form_Item_category_wrapper">
                    <div class="detail-form_Item_category">洋服</div>
                    <div class="detail-form_Item_category">メンズ</div>
                    <div class="detail-form_Item_category">フォーマル</div>
                    <div class="detail-form_Item_category">メンズ</div>
                </div>
            </div>
            <div class="detail-form_Item_condition_wrapper">
                <span class="detail-form_Item_condition_column_name">商品の状態</span>
                <span class="detail-form_Item_condition">良好</span>
            </div>
            <h2>コメント(1)</h2>
            <div class="detail-form_user_picture_wrapper">
                <img class="detail-form_user_picture" src="{{asset('storage/Armani+Mens+Clock.jpg')}}">
                <div class="detail-form_user_name">admin</div>
            </div>
            <div class="detail-form_user_comment">こちらにコメントが入ります</div>
            <form>
                <div class="detail-form_your_comment">商品へのコメント</div>
                <textarea class="detail-form_your_comment_description" rows="6" cols="25">コメント内容</textarea>
                <button class="detail-form_your_comment_post_button">コメントを送信する</button>
            </form>
        </div>
    </div>
</body>
@endsection
