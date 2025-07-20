<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PurchaseRequest;
use Illuminate\Support\Facades\Log;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function index(PurchaseRequest $request)
    {
        if ($request->payment_method == "カード支払い") {
            return view('payment.index', ['request' => $request]);
        } else {
            return redirect()->route('payment.direct', [
                'user_id' => Auth::id(),
                'item_id' => $request->input('item_id'),
                'payment_method' => $request->input('payment_method'),
                'delivery_address' => $request->input('delivery_address'),
            ]);
        }
    }
    public function checkout(Request $request)
    {
        // Set your secret key. Remember to switch to your live secret key in production.
        // See your keys here: https://dashboard.stripe.com/apikeys

        $stripe = new \Stripe\StripeClient(config('services.stripe.secret_key'));
        $session = $stripe->checkout->sessions->create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'jpy',
                        'product_data' => ['name' => $request->item_name],
                        'unit_amount' => intval($request->price),
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'customer_email' => $request->email,
            'success_url' => route('checkout.success', [
                'item_id' => $request->item_id,
                'delivery_address' => $request->delivery_address,
                'payment_method' => $request->payment_method,
                'price' => $request->price,
            ]),
            'cancel_url' => route('checkout.cancel'),   // Laravelのルートを使用
        ]);
        return redirect($session->url);
    }


    public function store(Request $request)
    {
        //dd($request);
        try {
            // APIキーをセットする
            Stripe::setApiKey(config('services.stripe.secret_key'));

            // Payment Intentを作成
            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => $request->query('price'),
                'currency' => 'jpy',
                'payment_method_types' => ['card'],
                'description' => '商品購入',

            ]);

            $item_id = $request->query('item_id');
            $delivery_address = $request->query('delivery_address');
            $payment_method = $request->query('payment_method');

            $item = Item::find($item_id);
            //soldでない場合はテーブルに保存する
            if ($item->status != "sold") {
                $user_id = Auth::id();
                $count = Purchase::where('item_id', $item_id)
                    ->where('user_id', $user_id)
                    ->count();
                if ($count == 0) {
                    $purchase = new Purchase;
                } else {
                    $purchase = Purchase::where('item_id', $item_id)
                        ->where('user_id', $user_id)
                        ->first();
                }
                $purchase->user_id = Auth::id();                  //1は本番ではAuth::id()となる
                $purchase->item_id = $item_id;
                $purchase->payment_method = $payment_method;
                $purchase->delivery_address = $delivery_address;
                $purchase->save();
                return view('temporary_message', [
                    'message' => 'ありがとうございました！ご購入が完了しました。',
                    'redirect_url' => '/thank-you',
                    'payment_intent' => $paymentIntent, // 追加
                ]);
            } else {
                //messages that this item is sold out .
                return view('temporary_message', [
                    'message' => '申し訳ありません、この商品は販売済みです。',
                    'redirect_url' => '/error'
                ]);
            }
        } catch (\Exception $e) {
            // エラー処理
            Log::error($e->getMessage());
            return view('temporary_message', [
                'message' => '決済に失敗しました...',
                'redirect_url' => '/error'
            ]);
        }
    }


    public function directPay(Request $request)
    {
        //soldでなければ新たなレコードを追加
        $item = Item::find($request->item_id);
        if ($item->status != "sold") {
            $user_id = Auth::id();
            $count = Purchase::where('item_id', $request->item_id)
                ->where('user_id', $user_id)
                ->count();
            //$count = Purchase::count();
            if ($count == 0) {
                $purchase = new Purchase;
            } else {
                $purchase = Purchase::where('item_id', $request->item_id)
                    ->where('user_id', $user_id)
                    ->first(); // 1件だけ取得する場合
            }
            $purchase->user_id = Auth::id();                  //1は本番ではAuth::id()となる
            $purchase->item_id = $request->item_id;
            $purchase->payment_method = $request->payment_method;
            $purchase->delivery_address = $request->delivery_address;
            $purchase->save();
            return view('temporary_message', [
                'message' => 'ありがとうございました！ご購入が完了しました。',
                'redirect_url' => '/thank-you'
            ]);
        } else {

            return view('temporary_message', [
                'message' => '申し訳ありません、この商品は販売済みです。',
                'redirect_url' => '/error'
            ]);
        }
    }
}
