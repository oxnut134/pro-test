<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>フリマアプリ</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
     @yield('css')
</head>

<body >
    <header class="frea-market_header">
             <img class="frea-market_header_logo" src=" {{ asset('storage/logo.svg')}}" alt="error">
             <input class="frea-market_header_input_key" type="text" value="なにをお探しですか？">
             <a class="frea-market_header_link">ログアウト</a>
             <a class="frea-market_header_link">マイページ</a>
             <button class="frea-market_header_button_to_exhibit">出品</button>
    </header>
    <main>
                @yield('content')
    </main>

</body>

</html>
