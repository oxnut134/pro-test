@extends('layouts.header')

@section('css')
<link rel="stylesheet" href="{{ asset('css/exhibit.css') }}">
@endsection

@section('content')

<body>
    <form class="exhibit_form">
        <div class="exhibit-form_container">
            <div class="exhibit-form_title">
                <h2 class="exhibit-form_exhibit_logo">商品の出品</h2>
            </div>
            <style>
                /* チェックボックスを非表示にする */
                input[type="file"] {
                    display: none;
                    /* ファイル入力を非表示にする */
                }

                /* ボタンの基本スタイル */
                .toggle_button {

                    padding: 5px 10px;
                    border: 2px solid red;
                    border-radius: 25px;
                    background-color: white;
                    color: red;
                    cursor: pointer;
                    text-align: center;
                    transition: background-color 0.3s, color 0.3s;
                    font-size: 12px;
                    margin-top: 10px;
                    margin-left: 17%;
                }

                /* ボタンがホバーされたときのスタイル */
                .toggle_button:hover {
                    background-color: rgba(255, 0, 0, 0.1);
                }
            </style>
            <div class="exhibit-form_user_picture_wrapper">
                <img class="exhibit-form_user_picture" id="imagePreview" src="{{asset('storage/Armani+Mens+Clock.jpg')}}" alt="選択した画像がここに表示されます。">
                <label for="imageInput" class="toggle_button">画像を選択する</label>
                <input class="exhibit-form_input_user_image" type="file" id="imageInput">
            </div>

            <script>
                document.getElementById('imageInput').addEventListener('change', function(event) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const imgElement = document.getElementById('imagePreview');
                            imgElement.src = e.target.result; // 画像のソースを設定
                        };
                        reader.readAsDataURL(file); // 画像をデータURLとして読み込む
                    }
                });
            </script>
            <h3 class="exhibit-form_subheading">
                商品の詳細
            </h3>
            <div class="exhibit-form_input_title">
                <h3 class="exhibit-form_input_title_logo">カテゴリー</h3>
            </div>
            <!---------------------------------------------------------->
            <style>
                /* チェックボックスを非表示にする */
                input[type="checkbox"] {
                    display: none;
                    /* チェックボックスを非表示にする */
                }

                /* ボタンの基本スタイル */
                .toggle_button_category {
                    display: inline-block;
                    margin: 1vh 1%;
                    padding: 2px 1.5%;
                    border: 2px solid red;
                    border-radius: 25px;
                    background-color: white;
                    color: red;
                    cursor: pointer;
                    text-align: center;
                    transition: background-color 0.3s, color 0.3s;
                    font-size: 12px;
                }

                /* チェックボックスがチェックされたときのスタイル */
                input[type="checkbox"]:checked+.toggle_button_category {
                    background-color: red;
                    /* オン時の背景色 */
                    color: white;
                    /* オン時の文字色 */
                    border: 2px solid red;
                    /* 枠線は赤 */
                }
            </style>

            <div class="exhibit-form_category_box">
                <!-- チェックボックスとラベル -->
     <!---ファッションのみname,valueを設定　本番でほかも追加------>
                <input type="checkbox" id="toggleCheckbox1" name="categories[]" value="ファッション">
                <label for="toggleCheckbox1" class="toggle_button_category">ファッション</label>
                <input type="checkbox" id="toggleCheckbox2">
                <label for="toggleCheckbox2" class="toggle_button_category">家電</label>
                <input type="checkbox" id="toggleCheckbox3">
                <label for="toggleCheckbox3" class="toggle_button_category">インテリア</label>
                <input type="checkbox" id="toggleCheckbox4">
                <label for="toggleCheckbox4" class="toggle_button_category">レディース</label>
                <input type="checkbox" id="toggleCheckbox5">
                <label for="toggleCheckbox5" class="toggle_button_category">メンズ</label>
                <input type="checkbox" id="toggleCheckbox6">
                <label for="toggleCheckbox6" class="toggle_button_category">コスメ</label>
                <input type="checkbox" id="toggleCheckbox7">
                <label for="toggleCheckbox7" class="toggle_button_category">本</label>
                <input type="checkbox" id="toggleCheckbox8">
                <label for="toggleCheckbox8" class="toggle_button_category">ゲーム</label>
                <input type="checkbox" id="toggleCheckbox9">
                <label for="toggleCheckbox9" class="toggle_button_category">スポーツ</label>
                <input type="checkbox" id="toggleCheckbox10">
                <label for="toggleCheckbox10" class="toggle_button_category">キッチン</label>
                <input type="checkbox" id="toggleCheckbox11">
                <label for="toggleCheckbox11" class="toggle_button_category">ハンドメイド</label>
                <input type="checkbox" id="toggleCheckbox12">
                <label for="toggleCheckbox12" class="toggle_button_category">アクセサリー</label>
                <input type="checkbox" id="toggleCheckbox13">
                <label for="toggleCheckbox13" class="toggle_button_category">おもちゃ</label>
                <input type="checkbox" id="toggleCheckbox14">
                <label for="toggleCheckbox14" class="toggle_button_category">ベビー・キッズ</label>
            </div>

           <!---------------------------------------------------->

            <div class="exhibit-form_input_title">
                <h3 class="exhibit-form_input_title_logo">商品の状態</h3>
            </div>
            <select class="exhibit-form_select_item_condition">
                <option>良好</option>
                <option>目立った汚れや傷なし</option>
                <option>やや汚れや傷あり</option>
                <option>状態が悪い</option>
            </select>
            <h3 class="exhibit-form_subheading">
                商品名と説明
            </h3>
            <div class="exhibit-form_input_title">
                <h3 class="exhibit-form_input_title_logo">商品名</h3>
            </div>
            <div class="exhibit-form_input_box ">
                <input class="exhibit-form_input_field" type="text" value="">
            </div>
            <div class="exhibit-form_input_title">
                <h3 class="exhibit-form_input_title_logo">ブランド名</h3>
            </div>
            <div class="exhibit-form_input_box ">
                <input class="exhibit-form_input_field" type="text" value="">
            </div>
            <div class="exhibit-form_input_title">
                <h3 class="exhibit-form_input_title_logo">商品の説明</h3>
            </div>
            <div class="exhibit-form_input_box ">
                <textarea class="exhibit-form_input_text_field" type="text" row="6" column="25"></textarea>
            </div>
            <div class="exhibit-form_input_title">
                <h3 class="exhibit-form_input_title_logo">販売価格</h3>
            </div>
            <div class="exhibit-form_input_box ">
                <input class="exhibit-form_input_field" type="text" value="">
            </div>
            <div class="exhibit-form_button_box">
                <button class="exhibit-form_redirect_button">出品する</button>
            </div>
        </div>
    </form>
</body>
@endsection
