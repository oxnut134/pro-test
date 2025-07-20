<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<div style="width:100%;height:60vh;display:flex;justify-content:center;align-items:center;flex-direction:column;">
    <div style="width:30%;height:10vh;">

        <form style="width:100%;display:flex;justify-content:center;" action="{{ route('checkout') }}" method="POST">
            @csrf

            <button style="width:50%;height:6vh;margin-top:5vh;;border:none;background-color:red;color:#fff;font-size:18px;" type="submit">決  済  す  る</button>

            <input type="hidden" name="delivery_address" value="{{ $request['delivery_address'] }}">
            <input type="hidden" name="payment_method" value="{{ $request['payment_method'] }}">
            <input type="hidden" name="price" value="{{ $request['price'] }}">
            <input type="hidden" name="item_id" value="{{ $request['item_id'] }}">
            <input type="hidden" name="item_name" value="{{ $request['item_name'] }}">
            <input type="hidden" name="email" value="{{ $request['email'] }}">
            <input type="hidden" name="stripeToken" id="stripeToken">

        </form>
    </div>
    <a style="margin-top:10vh;"href="/purchase/{{ $request['item_id'] }}"> キャンセル</a>
</div>
