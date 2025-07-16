<div style="width:100%;height:60vh;display:flex;justify-content:center;align-items:center;flex-direction:column;">
    <div style="width:30%;height:10vh;">

        <form style="width:100%;display:flex;justify-content:center;" action="{{ route('payment.store') }}" method="post">
            @csrf
            <script
                src="https://checkout.stripe.com/checkout.js"
                class="stripe-button"
                data-key="{{ config('services.stripe.public_key') }}"
                data-amount="{{ $request['price'] }}"
                data-name="決済フォーム"
                data-label="決済する"
                data-description="単発決済: {{ $request['price'] }}円"
                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                data-locale="auto"
                data-currency="JPY"
                data-email="{{ $request['email'] }}">

            </script>
            <!-- 隠しフィールド -->
            <input type="hidden" name="delivery_address" value="{{ $request['delivery_address'] }}">
            <input type="hidden" name="payment_method" value="{{ $request['payment_method'] }}">
            <input type="hidden" name="price" value="{{ $request['price'] }}">
            <input type="hidden" name="item_id" value="{{ $request['item_id'] }}">
            <input type="hidden" name="email" value="{{ $request['email'] }}">
            <input type="hidden" name="stripeToken" id="stripeToken">

        </form>
    </div>
    <a href="/purchase/{{ $request['item_id'] }}"> キャンセル</a>
</div>
<!--<div style="width:100%;height:60vh;display:flex;justify-content:center;align-items:center;flex-direction:column;">
    <div style="width:30%;height:10vh;">
        <form  style="width:100%;display:flex;justify-content:center;" id="payment-form" action="{{ route('payment.store') }}" method="post">
            @csrf
            <script
                src="https://checkout.stripe.com/checkout.js"
                class="stripe-button"
                data-key="{{ config('services.stripe.public_key') }}"
                data-amount="{{ $request['price'] }}"
                data-name="決済フォーム"
                data-label="カード決済"
                data-description="単発決済: {{ $request['price'] }} 円"
                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                data-locale="auto"
                data-currency="JPY"
                data-email="{{ $request['email'] }}">
            </script>

            <!- 隠しフィールド ->
            <input type="hidden" name="delivery_address" value="{{ $request['delivery_address'] }}">
            <input type="hidden" name="payment_method" value="{{ $request['payment_method'] }}">
            <input type="hidden" name="price" value="{{ $request['price'] }}">
            <input type="hidden" name="item_id" value="{{ $request['item_id'] }}">
            <input type="hidden" name="email" value="{{ $request['email'] }}">
            <input type="hidden" name="stripeToken" id="stripeToken">
        </form>
    </div>
    <a href="/purchase/{{ $request['item_id'] }}"> キャンセル</a>
</div>
-->

<!--<script>
    // Stripe Checkoutをカスタマイズ
    var stripeHandler = StripeCheckout.configure({
        key: "{{ config('services.stripe.public_key') }}", // 公開キー
        locale: "auto",
        token: function(token) {
            // Stripeトークンを取得した際に呼び出されるコールバック

            // トークンをフォームの隠しフィールドにセット
            document.getElementById('stripeToken').value = token.id;

            // フォームを自動送信
            document.getElementById('payment-form').submit();
        }
    });

    // Stripeボタンのクリックイベントを上書き
    document.querySelector('.stripe-button-el').addEventListener('click', function(e) {
        e.preventDefault(); // デフォルトの動作を防ぐ

        // Stripe Checkoutの画面を表示
        stripeHandler.open({
            name: "決済フォーム",
            description: "単発決済: {{ $request['price'] }} 円",
            amount: $request['price'],
            currency: "JPY",
            email: "{{ $request['email'] }}"
        });
    });

    // ウィンドウが閉じられた場合の処理（必要に応じて）
    window.addEventListener('popstate', function() {
        stripeHandler.close();
    });
</script>-->
