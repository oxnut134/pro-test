@extends('layouts.header_chat')

@section('css')
<link rel="stylesheet" href="{{ asset('css/chat.css') }}">
@endsection

@section('content')
<div class="chat_form">
    <div class="chat_side_bar" style="width:20%;background-color:#ccc;color:#fff;">その他の取引</div>
    <div>
        <div style="height:10vh;display:flex;justify-content:space-between;align-items:center;border-bottom: 1px solid #000;">

            <?php
            ?>

            <span style="width:70%;">
                @if(isset($partner_profile[0]['profile_image']))
                <img class="chat_user_image" src="{{asset('storage/'.$partner_profile[0]['profile_image'])}}" alt="画像がここに表示されます。">
                @endif
                @if(isset($partner_name[0]))
                <span style="font-size:20px;margin-left:2%;">「{{ $partner_name[0] }}」さんとの取引画面</span>
                @endif
            </span>
            @if($auth_position == 'buyer')
            <span style="width:15%;">
                <button id="open-modal" style="width:80%;height:25px;background-color:red;color:#fff;border-radius:25px;border:none;font-size:10px;">取引を完了する</button>
            </span>
            @endif
        </div>

        <?php
        ?>

        <div style="display:flex;justify-content:flex-start;border-bottom: 1px solid #000;">
            <img style="width:15%;height:auto;margin-left:4%;margin-top:1%;margin-bottom:1%;" src="{{asset('storage/'. $item['item_image']) }}">
            <div style="display:flex;flex-direction:column;justify-content:center;margin-top:2%;margin-left:2%;">
                <div style="font-size:27px;color:#000;">{{ $item['item_name'] }}</div>
                <div style="margin-top:3vh;font-size:20px;" id="price">{{ $item['price'] }}</div>
            </div>
        </div>
        <script>
            const priceElement = document.getElementById('price');
            const price = parseInt(priceElement.innerText, 10);
            priceElement.innerText = price.toLocaleString() + '円';
        </script>
        <!---->
        @foreach($chat_messages as $chat_message)
        @foreach($chat_message['messages'] as $index => $message) <!-- インデックスを取得 -->
        @if(isset($message['message']))
        @if($message['position'] != $auth_position )
        <div style="height:15vh;">
            <div style="width:70%;">
                @if(isset($partner_profile[0]['profile_image']))
                <img style="width:5%;height:auto;border-radius: 50%;margin-left: 2%;margin-top: 0.5vh;" src="{{asset('storage/'.$partner_profile[0]['profile_image'])}}" alt="画像がここに表示されます。">
                @endif
                @if(isset($partner_name[0]))
                <span style="font-size:15px;margin-left:4%;">{{ $partner_name[0] }}</span>
                @endif
            </div>
            <div style="width:40%;height:40px;margin-top:0.5vh;margin-left:2%;border:none;background-color:#eee;font-size:12px;">{{ $message['message']}}</div>
        </div>
        @else
        <div style="height:20vh;display:flex;flex-direction:column;align-items:flex-end;">
            <div style="width:70%;display:flex;justify-content:flex-end;align-items:center;">
                @if(isset($my_name[0]))
                <span style="font-size:15px;margin-right:4%;">{{ $my_name[0] }}</span>
                @endif
                @if(isset($my_profile[0]['profile_image']))
                <img style="width:5%;height:auto;border-radius: 50%;margin-right: 2%;margin-top: 0.5vh;" src="{{asset('storage/'.$my_profile[0]['profile_image'])}}" alt="画像がここに表示されます。">
                @endif
            </div>



            <div class="message-container" style="width:40%;height:40px;margin-top:0.5vh;margin-right:2%;border:none;background-color:#eee;font-size:12px;">
                <span class="message-text">{{ $message['message'] }}</span>
                <input type="text" class="edit-input" style="display:none;width:100%;height:100%;font-size:12px;" value="{{ $message['message'] }}"
                    name="message[{{ $chat_message['chat']->id }}][{{ $index }}][message]">
            </div>
            <div class="message-container" style="width:10%;margin-right:2%;display:flex;justify-content:flex-end;">
                <button type="button" class="edit-button" data-index="{{ $index }}" style="width:40%;height:15px;margin-top:1vh;margin-right:2%;border:none;background-color:#fff;font-size:10px;">編集</button>
                <button type="button" class="delete-button" data-index="{{ $index }}" style="width:40%;height:15px;margin-top:1vh;border:none;background-color:#fff;font-size:10px;">消去</button>
            </div>
        </div>

        @endif
        @endif
        @endforeach
        @endforeach
        <form type="submit" action="/post" method="post">
            @csrf
            <div style="width:100%;height:10vh;display:flex;justify-content:center;align-items:flex-end;padding-right:0;">
                <input type="text" name="message_text" value="取引メッセージを入力してください" style="width:80%;height:30px;margin-top:0.5vh;margin-left:-5%;background-color:#eee;font-size:12px;border:1px solid #000;border-radius:5px;background-color:#fff;">

                @foreach($chat_messages as $chat_message)
                @foreach($chat_message['messages'] as $index => $message) <!-- インデックスを取得 -->
                <input type="hidden" name="message[{{ $chat_message['chat']->id }}][{{ $index }}][id]" value="{{ $message['id'] }}">
                <input type="hidden" name="message[{{ $chat_message['chat']->id }}][{{ $index }}][position]" value="{{ $message['position'] }}">
                <input type="hidden" name="message[{{ $chat_message['chat']->id }}][{{ $index }}][image]" value="{{ $message['image'] }}"> <!-- 画像情報 -->
                <input type="hidden" name="message[{{ $chat_message['chat']->id }}][{{ $index }}][message]" value="{{ $message['message'] }}"> <!-- メッセージ情報を追加 -->

                @endforeach
                @endforeach

                <input type="hidden" name="item_id" value="{{ $item['id'] }}">
                @if(isset($chat_id[0]))
                <input type="hidden" name="chat_id" value="{{ $chat_id[0] }}">
                @endif
                <button style="width:10%;height:4vh;border:1px solid #000;border-radius:5px;margin-left:3%;">投稿</button>
            </div>
        </form>
    </div>
</div>


<!-- ================ transaction modal ================ -->

<style>
    .modal {
        display: flex;
        justify-content: center;
        align-items: center;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .modal-content {
        background-color: #fefee6;
        padding: 0px;
        border-radius: 5px;
        width: 400px;
        height: 250px;
        position: relative;
        border: 1px solid #000;
    }

    .star {
        width: 18%;
        height: auto;
        cursor: pointer;
    }

    .submit-button {
        background-color: red;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
        position: absolute;
        bottom: 10px;
        right: 10px;
    }
</style>

<!-- モーダル本体を読み込むためのコンテナ -->
<div id="modal-container"></div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const modalContainer = document.getElementById('modal-container');
        const openModalButton = document.getElementById('open-modal');

        // モーダルを開く関数
        openModalButton.addEventListener("click", () => {
            fetch('/modal.html') // src/public/modal.html
                .then(response => response.text())
                .then(data => {
                    modalContainer.innerHTML = data; // モーダルの内容を挿入
                    const modal = document.getElementById("transaction-modal");
                    modal.style.display = "flex"; // モーダルを表示

                    // 星の評価を管理する変数
                    let selectedRating = 0;

                    // 星をクリックしたときの処理
                    const stars = document.querySelectorAll('.star');
                    stars.forEach(star => {
                        star.addEventListener('click', () => {
                            selectedRating = star.dataset.value; // 評価を取得
                            updateStars(selectedRating);
                        });
                    });

                    // 星の色を更新する関数
                    function updateStars(rating) {
                        stars.forEach(star => {
                            if (star.dataset.value <= rating) {
                                star.src = "http://localhost/storage/star-yellow-modal.png"; // 濃い黄色の星
                            } else {
                                star.src = "http://localhost/storage/star-gray-modal.png"; // 灰色の星
                            }
                        });
                    }

                    // 送信ボタンの処理
                    const submitButton = document.querySelector('.submit-button');
                    submitButton.addEventListener('click', () => {
                        alert(`評価: ${selectedRating}`);
                        modal.style.display = "none"; // モーダルを非表示
                    });

                    // モーダルの外側をクリックしたときに閉じる
                    window.addEventListener("click", (event) => {
                        if (event.target === modal) {
                            modal.style.display = "none"; // モーダルを非表示
                        }
                    });
                });
        });
    });
</script>


<!--------------- メッセージ　編集機能 ----------------------------->
<style>
    .edit-button {
        display: flex;
    }

    .edit-input {
        display: flex;
    }

    .message-container {
        display: flex;
    }

    .message-text {
        display: flex;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('.edit-button').forEach(button => {
            button.addEventListener('click', function() {
                const buttonContainer = this.parentElement;
                const messageContainer = buttonContainer.previousElementSibling;

                if (!messageContainer) {
                    console.error('メッセージコンテナが見つかりません。');
                    return; // 処理を中断
                }

                const messageText = messageContainer.querySelector('.message-text');
                const editInput = messageContainer.querySelector('.edit-input');

                if (!messageText || !editInput) {
                    console.error('メッセージテキストまたは編集入力フィールドが見つかりません。');
                    return; // 処理を中断
                }

                // メッセージテキストを編集入力フィールドに設定
                editInput.value = messageText.textContent;

                // 編集入力フィールドを表示し、メッセージテキストを非表示にする
                editInput.style.display = 'block';
                messageText.style.display = 'none';

                // 編集入力フィールドにリターンキーのイベントリスナーを追加
                editInput.addEventListener('keydown', function(event) {
                    if (event.key === 'Enter') {
                        // 編集した内容をメッセージテキストに設定
                        messageText.textContent = editInput.value;

                        // 編集入力フィールドを非表示にし、メッセージテキストを表示する
                        editInput.style.display = 'none';
                        messageText.style.display = 'flex';

                        // hidden input の値を更新
                        const hiddenMessageInput = document.querySelector(`input[name="message[{{ $chat_message['chat']->id }}][${button.getAttribute('data-index')}][message]"]`);
                        hiddenMessageInput.value = editInput.value; // 編集内容を hidden フィールドに保存

                        // デバッグ用: hidden フィールドの値を確認
                        console.log(`Updated hidden input for index ${button.getAttribute('data-index')}: ${hiddenMessageInput.value}`);
                    }
                });
            });
        });
    });
</script>

@endsection