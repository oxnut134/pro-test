<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Item;
use App\Models\User;
use App\Models\Profile;
use App\Models\Chat;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileRequest;


class UserController extends Controller
{

    public function myPage(Request $request)
    {
        $tab = $request->query('tab');
        //dd($tab);

        switch ($tab) {
            case "buy":
                return $this->getPurchasedItems();

            case "sell":
                return $this->getExhibitedItems();

            case "transaction":
                return $this->getTransactionItems();

            default:
                return $this->getProfile();
        }
    }




    public function getProfile()
    {
        //$items = Item::all();
        $items = Item::where('user_id', '!=', Auth::id())->get(); //本番はこちらに変更/自分の出品は表示なし
        foreach ($items as $item) {
            if (Purchase::where('item_id', $item->id)->exists()) {
                $item->status = "sold";
            } else {
                $item->status = "";
            }
            $item->save();
        }
        $auth_id = Auth::id();
        $user = User::find($auth_id);
        $profile = Profile::where('user_id', $auth_id)->first(); //本番はAuth::id()となる

        //------------ for pro test ---------------------
        $myChats = Chat::where('buyer_id', $auth_id)
            ->orWhere('seller_id', $auth_id)
            ->get();
        $score = 0;
        foreach ($myChats as $myChat) {
            if ($myChat->buyer_id == $auth_id) {
                $score = $score + $myChat->buyer_score;
            } else {
                $score = $score + $myChat->seller_score;
            }
        }
        if ($myChats->count()) {
            $scoreAveraged = round($score / $myChats->count());
        } else {
            $scoreAveraged = 0;
        }

        $messageCount = 0;
        foreach ($myChats as $myChat) {
            $Messages = Message::where('chat_id', $myChat->id)->get();
            $messageCount = $messageCount + $Messages->count();
        }

        //-------------------------------------------------

        return view(
            'mypage',
            [
                'items' => $items,
                //'keyword' => $
                'profile' => $profile,
                'user' => $user,
                'score_averaged' => $scoreAveraged,
                'message_count' => $messageCount,
                'colorTransactionItems' => "black",
            ]
        );
        //dd('on getProfile');
        //return view('mypage');
    }
    public function getPurchasedItems()

    {
        $auth_id = Auth::id();
        /*$items = Item::whereHas('purchase')
            ->where('user_id', $auth_id) //本番はAuth::id()となる
           ->get();*/

        $items = Item::whereHas('purchase', function ($query) {
            $query->where('user_id', Auth::id()); // Purchaseのuser_idがAuthと一致するもの
        })->get();
        //dd($item);
        $profile = Profile::where('user_id', $auth_id)->first(); //本番はAuth::id()となる
        $user = User::find($auth_id); //本番はAuth::id()となる

        //------------ for pro test ---------------------
        $myChats = Chat::where('buyer_id', $auth_id)
            ->orWhere('seller_id', $auth_id)
            ->get();
        $score = 0;
        foreach ($myChats as $myChat) {
            if ($myChat->buyer_id == $auth_id) {
                $score = $score + $myChat->buyer_score;
            } else {
                $score = $score + $myChat->seller_score;
            }
        }
        if ($myChats->count()) {
            $scoreAveraged = round($score / $myChats->count());
        } else {
            $scoreAveraged = 0;
        }

        $messageCount = 0;
        foreach ($myChats as $myChat) {
            $Messages = Message::where('chat_id', $myChat->id)->get();
            $messageCount = $messageCount + $Messages->count();
        }

        //-------------------------------------------------

        return view(
            'mypage',
            [
                'items' => $items,
                //'keyword' => $
                'profile' => $profile,
                'user' => $user,
                'score_averaged' => $scoreAveraged,
                'colorPurchasedItems' => "red",
                'colorTransactionItems' => "black",
                'message_count' => $messageCount,
            ],

        );
    }
    public function getExhibitedItems()
    {
        $auth_id = Auth::id();
        $items = Item::all()->where('user_id', $auth_id);
        //dd($item);
        $profile = Profile::where('user_id', $auth_id)->first(); //本番はAuth::id()となる
        $user = User::find($auth_id); //本番はAuth::id()となる

        //------------ for pro test ---------------------
        $myChats = Chat::where('buyer_id', $auth_id)
            ->orWhere('seller_id', $auth_id)
            ->get();
        $score = 0;
        foreach ($myChats as $myChat) {
            if ($myChat->buyer_id == $auth_id) {
                $score = $score + $myChat->buyer_score;
            } else {
                $score = $score + $myChat->seller_score;
            }
        }
        if ($myChats->count()) {
            $scoreAveraged = round($score / $myChats->count());
        } else {
            $scoreAveraged = 0;
        }

        $messageCount = 0;
        foreach ($myChats as $myChat) {
            $Messages = Message::where('chat_id', $myChat->id)->get();
            $messageCount = $messageCount + $Messages->count();
        }

        //-------------------------------------------------

        return view(
            'mypage',
            [
                'items' => $items,
                //'keyword' => $
                'profile' => $profile,
                'user' => $user,
                'score_averaged' => $scoreAveraged,
                'colorExhibitedItems' => "red",
                'colorTransactionItems' => "black",
                'message_count' => $messageCount,
            ]
        );
    }
    public function getTransactionItems()
    {
        $auth_id = Auth::id();
        $items = Item::where('status', '!=', 'sold')->get();
        $profile = Profile::where('user_id', $auth_id)->first(); //本番はAuth::id()となる
        $user = User::find($auth_id); //本番はAuth::id()となる

        //------------ for pro test ---------------------
        $myChats = Chat::where('buyer_id', $auth_id)
            ->orWhere('seller_id', $auth_id)
            ->get();
        $score = 0;
        foreach ($myChats as $myChat) {
            if ($myChat->buyer_id == $auth_id) {
                $score = $score + $myChat->buyer_score;
            } else {
                $score = $score + $myChat->seller_score;
            }
        }
        if ($myChats->count()) {
            $scoreAveraged = round($score / $myChats->count());
        } else {
            $scoreAveraged = 0;
        }

        $messageCount = 0;
        foreach ($myChats as $myChat) {
            $Messages = Message::where('chat_id', $myChat->id)->get();
            $messageCount = $messageCount + $Messages->count();
        }
        $messageCountOfItem = [];
        $oldMessageCountOfItem = [];
        $chatArray = [];
        foreach ($items as $item) {
            //            $chats = Chat::where('item_id', $item->id)->get();
            $chats = Chat::where('item_id', $item->id)
                ->where(function ($query) {
                    $query->where('buyer_id', Auth::id())
                        ->orWhere('seller_id', Auth::id());
                })->get();
            $numberOfMessages = 0;
            foreach ($chats as $chat) {
                $chatArray[] = $chat;
                $Messages = Message::where('chat_id', $chat->id)->get();
                $numberOfMessages = $numberOfMessages + $Messages->count();
            }
            $oldMessageCountOfItem[] = $item->messages_record;
            $messageCountOfItem[] = $numberOfMessages;
            $item->messages_record = $numberOfMessages;
            $item->save();
        }
        $itemArray = [];
        foreach ($chatArray as $chat) {
            $item = Item::where('id', $chat->item_id)->first(); // って最初のレコードを取得

            // Itemがあれば$itemArrayに追加
            if ($item) {
                $itemArray[] = $item;
            }
        }

        //dd($messageCountOfItem);

        //-----------------------s--------------------------

        return view(
            'mypage',
            [
                'items' => $items,
                'message_count_of_item' => $messageCountOfItem,
                'old_message_count_of_item' => $oldMessageCountOfItem,
                'profile' => $profile,
                'user' => $user,
                'score_averaged' => $scoreAveraged,
                'colorTransactionItems' => "red",
                'message_count' => $messageCount,
                'item_array' => $itemArray,
            ]
        );
    }
    // ------------- for pro test ----------------
    public function chat($itemId)
    {
        $item = Item::find($itemId);
        if ($item->user_id == Auth::id()) {
            $authPosition = "seller";
        } else {
            $authPosition = "buyer";
        }
        $auth_id = Auth::id();
        //$chats = Chat::where('item_id', $itemId)->get();
        $chats = Chat::where('item_id', $itemId)
            ->where(function ($query) {
                $query->where('buyer_id', Auth::id())
                    ->orWhere('seller_id', Auth::id());
            })->get();
        //dd($chats);
        $chatMessages = [];
        $partnerName = [];
        $partnerProfiles = [];
        $myName = [];
        $myProfiles = [];
        $chatId = [];

        foreach ($chats as $chat) {
            $messages = Message::where('chat_id', $chat->id)->get();

            $chatMessages[] = [
                'chat' => $chat,
                'messages' => $messages,
            ];
            //dd($chat->buyer_id);
            if ($chat->buyer_id == Auth::id()) {
                if ($chat->buyer_id) {
                    $myName[] = User::where('id', $chat->buyer_id)->first()->name;
                    $myProfiles[] = Profile::where('user_id', $chat->buyer_id)->first();
                }
                if ($chat->seller_id) {
                    $partnerName[] = User::where('id', $chat->seller_id)->first()->name;
                    $partnerProfiles[] = Profile::where('user_id', $chat->seller_id)->first();
                }
            } else {
                if ($chat->seller_id) {
                    $myName[] = User::where('id', $chat->seller_id)->first()->name;
                    $myProfiles[] = Profile::where('user_id', $chat->seller_id)->first();
                }
                if ($chat->buyer_id) {
                    $partnerName[] = User::where('id', $chat->buyer_id)->first()->name;
                    $partnerProfiles[] = Profile::where('user_id', $chat->buyer_id)->first();
                }
            }
            $chatId[] = $chat->id;
        }

        return view('chat', [
            'item' => $item,
            'auth_position' => $authPosition,
            'chat_messages' => $chatMessages,
            'my_name' => $myName,
            'my_profile' => $myProfiles,
            'partner_name' => $partnerName,
            'partner_profile' => $partnerProfiles,
            'chat_id' => $chatId,
        ]);
    }

    public function post(Request $request)
    {

        //-------- DB保存 --------------
        $itemId = $request->item_id;
        $chatId = $request->chat_id;
        $messageText = $request->message_text;
        $item = Item::find($itemId);
        //dd($request);
        if ($chatId) {
            $message = new Message;
            $message->chat_id = $chatId;
            if ($item->user_id == Auth::id()) {
                $message->position = "seller";
            } else {
                $message->position = "buyer";
            }
            $message->message = $messageText;
            $message->save();
        } else {

            if ($item->user_id == Auth::id()) {
                $sellerId = Auth::id();
                $buyerId = null;
            } else {
                $buyerId = Auth::id();
                $sellerId = $item->user_id;
            }
            $chat = Chat::create([
                'buyer_id' => $buyerId,
                'seller_id' => $sellerId,
                'item_id' => $item->id,
                'buyer_score' => null,
                'seller_score' => null,
            ]);

            $message = new Message;
            $message->chat_id = $chat->id;
            if ($item->user_id == Auth::id()) {
                $message->position = "seller";
            } else {
                $message->position = "buyer";
            }
            $message->message = $messageText;
            $message->save();
        }
        //-------- chat画面再立ち上げ ------------

        if ($item->user_id == Auth::id()) {
            $authPosition = "seller";
        } else {
            $authPosition = "buyer";
        }
        $auth_id = Auth::id();
        $chats = Chat::where('item_id', $itemId)
            ->where(function ($query) {
                $query->where('buyer_id', Auth::id())
                    ->orWhere('seller_id', Auth::id());
            })->get();
        $chatMessages = [];
        $partnerName = [];
        $partnerProfiles = [];
        $myName = [];
        $myProfiles = [];
        $chatId = [];

        foreach ($chats as $chat) {
            $messages = Message::where('chat_id', $chat->id)->get();

            $chatMessages[] = [
                'chat' => $chat,
                'messages' => $messages,
            ];
            if ($chat->buyer_id == Auth::id()) {
                if ($chat->buyer_id) {
                    $myName[] = User::where('id', $chat->buyer_id)->first()->name;
                    $myProfiles[] = Profile::where('user_id', $chat->buyer_id)->first();
                }
                if ($chat->seller_id) {
                    $partnerName[] = User::where('id', $chat->seller_id)->first()->name;
                    $partnerProfiles[] = Profile::where('user_id', $chat->seller_id)->first();
                }
            } else {
                if ($chat->seller_id) {
                    $myName[] = User::where('id', $chat->seller_id)->first()->name;
                    $myProfiles[] = Profile::where('user_id', $chat->seller_id)->first();
                }
                if ($chat->buyer_id) {
                    $partnerName[] = User::where('id', $chat->buyer_id)->first()->name;
                    $partnerProfiles[] = Profile::where('user_id', $chat->buyer_id)->first();
                }
            }
            $chatId[] = $chat->id;
        }

        return view('chat', [
            'item' => $item,
            'auth_position' => $authPosition,
            'chat_messages' => $chatMessages,
            'my_name' => $myName,
            'my_profile' => $myProfiles,
            'partner_name' => $partnerName,
            'partner_profile' => $partnerProfiles,
            'chat_id' => $chatId,
        ]);
    }


    //-------------------------------------------



    public function showProfile(Request $request)
    {
        //dd($request);
        $backup_image = $request->profile_image;

        return view(
            'profile',
            [
                'profile' => $request,
                'backup_image' => $backup_image
            ]
        );
    }
    public function updateProfile(ProfileRequest $request)
    {
        $user_id = Auth::id();
        $user = User::find($user_id);   //1は本番ではAuth::id()となる
        $profile = Profile::where('user_id', $user_id)->first();

        $user->name = $request->user_name;
        if ($request->profile_image == null) {
            $profile->profile_image = $request->backup_image;
        } else {
            // get new file attributes from temporary directory of PHP when image file was replaced.
            $file = $request->file('profile_image');
            //get new file name
            $originalFileName = $file->getClientOriginalName();
            //set new file name
            $profile->profile_image = $originalFileName;
        }
        $profile->post_code = $request->post_code;
        $profile->address = $request->address;
        $profile->building = $request->building;
        $user->save();
        $profile->save();

        return redirect()->route('mypage');
    }
}
