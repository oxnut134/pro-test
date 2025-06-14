<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\UserController;


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

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::get('/update', [TestController::class, 'update']);
Route::get('/register', [TestController::class, 'register']);
Route::get('header', [TestController::class, 'header']);

//---------------- frea-market -----------------------------
Route::get('/header', [TestController::class,'header']);

Route::get('/login', [AuthController::class,'login']);
Route::get('/register', [AuthController::class,'register']);

Route::get('/', [ItemController::class,'index']);
Route::get('/item/{item_id}', [ItemController::class,'getItemDetail']);
Route::get('/purchase/{item_id}', [PurchaseController::class,'purchaseItems']);
Route::get('/purchase/address/{item_id}', [PurchaseController::class,'redirectAddress']);
Route::get('/mypage', [UserController::class,'getProfile']);
Route::get('/mypage/profile', [UserController::class,'updateProfile']);
Route::get('/sell', [ItemController::class,'exhibitItems']);
Route::get('/register', [AuthController::class,'register']);
