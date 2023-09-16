<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        // いいね機能非同期処理
        window.onload = function(){
	        var likeButton = ".like_button";
            // likesテーブルにレコードがある状態（いいねをした後）＝1
            if ($(likeButton).data('is-like') == 1) {
                $(likeButton).addClass("text-white bg-red-500")
                $(likeButton).removeClass("text-red-500 bg-white")
                $(likeButton).text("イキタイ済")
            } else {
                $(likeButton).removeClass("text-white bg-red-500")
                $(likeButton).addClass("text-red-500 bg-white")
                $(likeButton).text("イキタイ")
            }
        };
        function toggleLike(storeId) {
            var likeButton = ".like_button";
            if ($(likeButton).data('is-like') == 1) {
                $(likeButton).removeClass("text-white bg-red-500")
                $(likeButton).addClass("text-red-500 bg-white")
                $(likeButton).text("イキタイ")
                $(likeButton).data('is-like', 0)
                $.ajax({
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                        },
                        url: `/unlike/${storeId}`,
                        type: "POST",
                    })
                    .done(function(data, status, xhr) {
                        console.log(data);
                    })
                    .fail(function(xhr, status, error) {
                        console.log();
                    });
            } else {
                $(likeButton).addClass("text-white bg-red-500")
                $(likeButton).removeClass("text-red-500 bg-white")
                $(likeButton).text("イキタイ済")
                $(likeButton).data('is-like', 1)
                $.ajax({
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                        },
                        url: `/like/${storeId}`, //URLでコントローラーにパラメーターを渡す
                        type: "POST",
                    })
                    .done(function(data, status, xhr) {
                        console.log(data);
                    })
                    .fail(function(xhr, status, error) {
                        console.log();
                    });
            }
        }
        // 削除確認メッセージ
        function deletePost(e) {
            'use strict'
            if (confirm('本当に削除していいですか?')) {
                document.getElementById('delete_' + e.dataset.id).submit()
            }
        }
    </script>

    <!-- Toastr.jsを使えるようにする -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    <!-- Toastr.js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <!-- フラッシュメッセージ用のbladeファイルを読み込み -->
    @include('layouts.flash-message')
</body>

</html>