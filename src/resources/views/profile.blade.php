@extends('layouts.header')

@section('css')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('content')

<body>
    <form class="profile_form">
        <div class="profile-form_container">
            <div class="profile-form_title">
                <h2 class="profile-form_profile_logo">プロフィール設定</h2>
            </div>
            <!--<div class="profile-form_user_picture_wrapper">
                <img class="profile-form_user_picture" src="{{asset('storage/Armani+Mens+Clock.jpg')}}">
                <input class="profile-form_input_user_image" type="file" value="画像を選択する">
            </div>-->
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
            <div class="profile-form_user_picture_wrapper">
                <img class="profile-form_user_picture" id="imagePreview" src="{{asset('storage/Armani+Mens+Clock.jpg')}}" alt="選択した画像がここに表示されます。">
                <label for="imageInput" class="toggle_button">画像を選択する</label>
                <input class="profile-form_input_user_image" type="file" id="imageInput">
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
            <!--</div>-->
            <div class="profile-form_input_title">
                <h3 class="profile-form_input_title_logo">ユーザー名</h3>
            </div>
            <div class="profile-form_input_box ">
                <input class="profile-form_input_field" type="text" value="既存の値が入力されている">
            </div>
            <div class="profile-form_input_title">
                <h3 class="profile-form_input_title_logo">郵便番号</h3>
            </div>
            <div class="profile-form_input_box ">
                <input class="profile-form_input_field" type="text" value="既存の値が入力されている">
            </div>
            <div class="profile-form_input_title">
                <h3 class="profile-form_input_title_logo">住所</h3>
            </div>
            <div class="profile-form_input_box ">
                <input class="profile-form_input_field" type="text" value="既存の値が入力されている">
            </div>
            <div class="profile-form_input_title">
                <h3 class="profile-form_input_title_logo">建物名</h3>
            </div>
            <div class="profile-form_input_box ">
                <input class="profile-form_input_field" type="text" value="既存の値が入力されている">
            </div>
            <div class="profile-form_button_box">
                <button class="profile-form_redirect_button">更新する</button>
            </div>
        </div>
    </form>
</body>
@endsection
