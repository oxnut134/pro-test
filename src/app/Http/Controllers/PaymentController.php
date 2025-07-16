<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use App\Models\Purchase;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\PurchaseRequest;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function index(PurchaseRequest $request)
    {
        //dd($request);
        if ($request->payment_method == "カード支払い") {
            return view('payment.index', ['request' => $request]);
        } else {
            //dd($request);
            //return redirect()->route('payment.direct', ['request' => $request]);
            return redirect()->route('payment.direct', [
                'user_id' => Auth::id(),
                'item_id' => $request->input('item_id'),
                'payment_method' => $request->input('payment_method'),
                'delivery_address' => $request->input('delivery_address'),
            ]);
        }
    }

    //This function, named 'store,' was originally created for the payment route of the Stripe
    //test page. Eventually, it was unified into the 'directPay' function. On the other hand,
    //this routine may include some production code for Stripe payments. Therefore, it is
    //recommended to keep it as a reference.

    /*  */
    public function store(Request $request)
    {
        //dd($request);
        try {
            // APIキーをセットする
            Stripe::setApiKey(config('services.stripe.secret_key'));

            // Payment Intentを作成
            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => $request->price, // 金額（最小通貨単位、例: 円の場合は「銭」）
                'currency' => 'jpy', // 通貨コード
                'payment_method_types' => ['card'], // 支払い方法を指定
                'description' => '商品購入', // 必要に応じて説明を追加
            ]);

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

                //messages that this item is sold out .
                return view('temporary_message', [
                    'message' => '申し訳ありません、この商品は販売済みです。',
                    'redirect_url' => '/error'
                ]);
            }
            // フロントエンドに渡す必要があるclient_secretを取得
            //return redirect(route('payment.index', [
            //    'client_secret' => $paymentIntent->client_secret,
            //    'message' => '決済を進めてください。',
            //]));
        } catch (\Exception $e) {
            // エラー処理
            Log::error($e->getMessage());
            return view('temporary_message', [
                'message' => '決済に失敗しました...',
                'redirect_url' => '/error'
            ]);
            //return redirect(route('payment.index', [
            //    'message' => '決済に失敗しました...',
            //]));
        }
    }


    public function directPay(Request $request)
    {
        //dd($request);
        //dd($request);
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

            //messages that this item is sold out .
            return view('temporary_message', [
                'message' => '申し訳ありません、この商品は売り切れです。',
                'redirect_url' => '/error'
            ]);
        }
    }
}
