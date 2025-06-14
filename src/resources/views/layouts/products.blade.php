@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/products.css') }}">
@endsection

@section('content')

<body class="product_form">
    <div class="product_form_title_holder">
        <div class="product_form_title">
            <h5 class="product_form_title_adjust">商品一覧</h5>
        </div>
        <a class="product_form_button_add_product" href="/products/register">商品を追加</a>
    </div>
    <div class="product_form_platform">
        <div class="product_form_operation">
            <form class="product_form_search" action="/products/search" method="post">
                @csrf
                <input class="product_form_search_input_key" type="text" name="keyword">
                <button class="product_form_search_button">
                    検索</button>
            </form>
            <form class="product_form_sort" action="/products/sort" method="get">
                @csrf
                <div class="product_form_sort_criteria">
                    <h5>価格順で表示</h5>
                </div>
                <div class="product_form_sort_criteria_holder">
                    <select class="product_form_sort_select_criteria" name="criteria">
                        @if(isset($request['criteria']))
                        <option value="{{ $request['criteria'] }}">{{ $request['criteria'] }}</option>
                        @if( $request['criteria'] =="高い順に表示")
                        <option value="低い順に表示">低い順に表示</option>
                        @else
                        <option value="高い順に表示">高い順に表示</option>
                        @endif
                        @else
                        <option value="高い順に表示">高い順に表示</option>
                        <option value="低い順に表示">低い順に表示</option>
                        @endif
                    </select>
                </div>
                <div><button type="submit" aria-checked="" class="product_form_sort_button">
                        @if(isset($request['criteria']))
                        {{ $request['criteria']}}
                        @else
                        並び替え
                        @endif
                    </button>
                    <a class="product_form_sort_reset " href="/">×</a>
                </div>
            </form>
        </div>
        <div class="product_form_items">
            @foreach($products as $product)
            <div class="product_form_image_wrapper">
                <a class="product_form_fruit_image" href="/products/{{ $product['id'] }}/update">
                    <img class="fruit_image" src="{{asset('storage/'.$product['image'])}}">
                </a>
                <div class="product_form_image_name">
                    <div>{{ $product['name'] }}</div>
                    <div>{{ '¥'.$product['price'] }}</div>
                </div>
            </div>
            @endforeach
            <div class="pagenation">
                <div>{{ $products->links() }}</div>
            </div>
            <style>
                .pagenation {
                    width: 100%;
                    height: 50px;
                    display: flex;
                    justify-content: center;
                    align-items: flex-end;
                }
            </style>
        </div>
    </div>
</body>


@endsection
