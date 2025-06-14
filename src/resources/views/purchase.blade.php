@extends('layouts.header')

@section('css')
<link rel="stylesheet" href="{{ asset('css/purchase.css') }}">
@endsection

@section('content')

<body>
    <form class="purchase-form">
        <div class="purchase-form_confirm_box">
            <div class="purchase-form_item_image_wrapper">
                <img class="purchase-form_item_image" src="{{asset('storage/Armani+Mens+Clock.jpg')}}">
                <div class="purchase-form_item_information">
                    <div class="purchase-form_item_name">商品名</div>
                    <div class="purchase-form_item_price">¥ 47,000</div>
                </div>
            </div>
            <div class="purchase-form_item_payment_method">
                <h3 class="purchase-form_item_payment_method_column_name">支払い方法</h3>
                <select class="purchase-form_select_payment_method">
                    <option value="" disabled selected>選択してください</option>
                    <option>コンビニ払い</option>
                    <option>カード支払い</option>
                </select>
            </div>
            <div class="purchase-form_shipping_address_wrapper">
                <div class="purchase-form_shipping_address_redirect_row">
                    <h3 class="purchase-form_shipping_address_column_name">配送先</h3>
                    <h3 class="purchase-form_shipping_address_redirect_button">変更する</h3>
                </div>
                <div class="purchase-form_shipping_address">〒XXX-XXXX</div>
                <div class="purchase-form_shipping_address">ここには住所と建物が入ります</div>
            </div>
        </div>
        <div class="purchase-form_purchase_box">
            <div class="purchase-form_purchase_bag">
                <div class="purchase-form_purchase_payment_wrapper">
                    <span class="purchase-form_purchase_payment">商品代金</span>
                    <span class="purchase-form_purchase_payment">¥47,000</span>
                </div>
                <div class="purchase-form_purchase_payment_method_wrapper">
                    <span class="purchase-form_purchase_payment_method">支払い方法</span>
                    <span class="purchase-form_purchase_payment_method">コンビニ払い</span>
                </div>
                <button class="purchase-form_purchase_button">購入する</button>
            </div>
        </div>
    </form>
</body>
@endsection
