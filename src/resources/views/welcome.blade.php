<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="antialiased">
        <div class="bg-cover bg-center bg-opacity-50 min-h-screen" style="background-image: url(/image/top2.jpeg);">
        <!-- <div class="relative bg-center sm:flex sm:justify-center sm:items-center min-h-screen bg-gray-100 dark:bg-gray-900 selection:bg-red-500 "> -->
            @if (Route::has('login'))
                <!-- <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10"> -->
                <div class="flex justify-end">
                    @auth
                        <button class="m-4 bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow p-5" onclick="location.href='{{ route('stores.index') }}'" >
                            ジムを検索する
                        </button>
                        <!-- <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">ジムを検索する</a> -->
                    @else
                        <!-- <a href="{{ route('login') }}" class="font-semibold text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">ログイン</a> -->
                        <button class="m-4 bg-white hover:bg-gray-200 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow" onclick="location.href='{{ route('login') }}'" >
                            ログイン
                        </button>

                        @if (Route::has('register'))
                            <!-- <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">新規登録</a> -->
                            <button class="m-4 bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow p-5" onclick="location.href='{{ route('register') }}'" >
                                新規登録
                            </button>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="flex justify-center">
                <image src="/image/logo1.png" class="items-center" >    
            </div>
            <h1 class="sm:text-3xl text-2xl font-extrabold title-font text-center text-white mb-20">あなたにとって最適なジムがきっと見つかる
                <br class="hidden sm:block">トレーニーによるトレーニーのためのジムの口コミアプリ
            </h1>       
        </div>
    </body>
</html>
