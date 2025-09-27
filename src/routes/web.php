<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\MailController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//---------------- 模擬テスト　frea-market -----------------------------

//未認証ユーザー閲覧可能
Route::get('/frea', [ItemController::class, 'index']);
Route::get('/item/{item_id}', [ItemController::class, 'getItemDetail']);

//login, register, profile.first
Route::middleware('auth')->group(function () {

    //http://localhost
    Route::get('/', [ItemController::class, 'index']);

    //商品検索
    Route::post('/search', [ItemController::class, 'search']);

    //商品購入
    Route::get('/purchase/{item_id}', [PurchaseController::class, 'purchaseItems'])->name('purchase');

    //納品先住所変更
    Route::get('/purchase/address/{item_id}', [PurchaseController::class, 'redirectAddress']);
    Route::post('/purchase/address/return', [PurchaseController::class, 'returnPurchase'])->name('purchase.redirect');

    //プロフィール（マイページ）
    Route::get('/mypage', [UserController::class, 'mypage'])->name('mypage');
    Route::get('/mypage/purchasedItems', [UserController::class, 'getPurchasedItems']);
    Route::get('/mypage/exhibitedItems', [UserController::class, 'getExhibitedItems']);
    Route::get('/mypage/transactionItems', [UserController::class, 'getTransactionItems']);
    Route::get('/mypage/profile', [UserController::class, 'showProfile']);
    Route::post('/mypage/profile', [UserController::class, 'updateProfile']);

    //商品出品
    Route::get('/sell', [ItemController::class, 'exhibitItems']);
    Route::post('/sell', [ItemController::class, 'upItem']);

    //いいね＆コメント
    Route::get('/like/{id}/add', [LikeController::class, 'add']);
    Route::get('/like/{id}/remove', [LikeController::class, 'remove']);
    Route::post('/item/comment', [CommentController::class, 'addComment']);

    //stripe 決済
    Route::post('/stripe', [PaymentController::class, 'index'])->name('payment.index');
    Route::post('/payment', [PaymentController::class, 'store'])->name('payment.store');
    Route::get('/payment/direct', [PaymentController::class, 'directPay'])->name('payment.direct');

    //会員登録後のプロフィール入力
    Route::get('/profile/first', [AuthController::class, 'Profilefirst'])->name('profile.first');
    Route::post('/profile/first', [AuthController::class, 'addProfile']);
    //Route::get('/index', [AuthController::class, 'index'])->name('index');;

    //認証メール  mailhog
    Route::get('/send-mail', [MailController::class, 'sendMail'])->name('send-mail');
    Route::post('/send-reply-mail', [MailController::class, 'sendReply'])->name('send-reply-mail');
    //for the button requiring to resend a confirmation mail
    Route::get('/email', [MailController::class, 'showEmail']);

    //stripe 新API対応
    Route::post('/checkout', [PaymentController::class, 'checkout'])->name('checkout');
    Route::get('/checkout/success', [PaymentController::class, 'store'])->name('checkout.success');
    Route::get('/checkout/cancel', [PaymentController::class, 'cancel'])->name('checkout.cancel');
});

//=======================  pro test ===========================

Route::get('/chat/{item_id}', [UserController::class, 'chat'])->name('chat');
Route::post('/post', [UserController::class, 'post'])->name('post');
Route::get('/message/delete', [UserController::class, 'messageDelete'])->name('message.delete');
