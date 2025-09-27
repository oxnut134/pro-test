@extends('layouts.header')

@section('css')
<link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')

<form class="mypage-form_user_profile_box" action="/mypage/profile" method="get">
    @csrf
    <div class="mypage-form_user_picture_wrapper">
        <img class="mypage-form_user_picture" src="{{asset('storage/'.$profile['profile_image'])}}" alt="画像がここに表示されます。">
        <div class="mypage-form_user_name">
            <div>{{ $user['name'] }}</div>
            <div style="width:2%;height:1vh;display:flex;flex-direction:row;">
                @if($score_averaged>0)
                @for ($i = 1; $i <= 5; $i++)
                    <span class="mypage-form_chat_score">
                    @if($i<=$score_averaged)
                        <img style="width:30px;height:auto;" src="{{asset('storage/star-yellow.png')}}">
                        @else
                        <img style="width:30px;height:auto;" src="{{asset('storage/star-gray.png')}}">
                        @endif
                        </span>
                        @endfor
                        @endif
            </div>
        </div>
    </div>
    <input type="hidden" name="profile_image" value="{{ $profile['profile_image'] }}">
    <input type="hidden" name="user_name" value="{{ $user['name'] }}">
    <input type="hidden" name="post_code" value="{{ $profile['post_code'] }}">
    <input type="hidden" name="address" value="{{ $profile['address'] }}">
    <input type="hidden" name="building" value="{{ $profile['building'] }}">
    <button class="mypage-form_edit_profile_button">
        プロフィールを編集
    </button>
</form>
<div class="mypage-form_mode_change_button_box">
    @if(@isset($colorExhibitedItems) && $colorExhibitedItems=='red')
    <a class="mypage-form_mode_exhibited_item_button" style="color:red" href="/mypage/?tab=sell">出品した商品</a>
    @else
    <a class="mypage-form_mode_exhibited_item_button" style="color:black" href="/mypage/?tab=sell">出品した商品</a>
    @endif

    @if(@isset($colorPurchasedItems) && $colorPurchasedItems=='red')
    <a class="mypage-form_mode_purchased_item_button" style="color:red" href="/mypage/?tab=buy">購入した商品</a>
    @else
    <a class="mypage-form_mode_purchased_item_button" style="color:black" href="/mypage/?tab=buy">購入した商品</a>
    @endif

    @if(@isset($colorTransactionItems) && $colorTransactionItems=='red')
    <a class="mypage-form_mode_chat_item_button" style="color:red" href="/mypage/?tab=transaction">取引中の商品<span style="display:inline-block;width:20px;height:20px;margin-left:2px;border-radius:50%;background-color:red;color:#fff;line-height:20px; text-align:center;">{{ $message_count }}</span></a>
    @else
    <a class="mypage-form_mode_chat_item_button" style="color:black" href="/mypage/?tab=transaction">取引中の商品<span style="display:inline-block;width:20px;height:20px;margin-left:2px;border-radius:50%;background-color:red;color:#fff;line-height:20px; text-align:center;">{{ $message_count }}</span></a>
    @endif

</div>
<div class="mypage-form_image_box" style="text-decoration:none;">
    @if(isset($items))
    @if($colorTransactionItems=='red')
    @foreach($item_array as $index => $item)
    <a class="mypage-form_image_wrapper" style="position:relative;" href="/chat/{{ $item['id'] }}">
        <img class="mypage-form_image_attribute" src="{{asset('storage/'. $item['item_image']) }}">
        @if(isset($message_count_of_item[$index+1]) && $message_count_of_item[$index+1] != 0 && $message_count_of_item[$index+1] > $old_message_count_of_item[$index+1])
        <span style="position: absolute; top: 0; left: 0; width: 20px; height: 20px; 
        border-radius: 50%; background-color: red; color: #fff; line-height: 20px; text-align: center;">
            {{ $message_count_of_item[$index+1] }}
        </span>
        @endif
        <div style="display:flex;justify-content:space-between;">
            <div style="color:#000;">{{ $item['item_name'] }}</div>
            <div style="color:red;font-size:20px;">{{ $item['status'] }}</div>
        </div>
    </a>
    @endforeach
    @else
    @foreach($items as $index => $item)
    <a class="mypage-form_image_wrapper" style="position:relative;" href="/item/{{ $item['id'] }}">
        <img class="mypage-form_image_attribute" src="{{asset('storage/'. $item['item_image']) }}">
        @if(isset($message_count_of_item[$index]) && $message_count_of_item[$index] != 0 && $message_count_of_item[$index] > $old_message_count_of_item[$index])
        <span style="position: absolute; top: 0; left: 0; width: 20px; height: 20px; border-radius: 50%; background-color: red; color: #fff; line-height: 20px; text-align: center;">
            {{ $message_count_of_item[$index] }}
        </span>
        @endif
        <div style="display:flex;justify-content:space-between;">
            <div style="color:#000;">{{ $item['item_name'] }}</div>
            <div style="color:red;font-size:20px;">{{ $item['status'] }}</div>
        </div>
    </a>
    @endforeach
    @endif
    @endif
</div>

</body>

@endsection