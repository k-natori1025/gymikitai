<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      ジム詳細画面
    </h2>
  </x-slot>

  <section class="text-gray-600 body-font mt-12">
    <div class="bg-white container mx-auto flex px-5 py-12 md:flex-row flex-col items-center overflow-hidden shadow-sm sm:rounded-lg">
      <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
        @if(empty($store->filename))
          <img src="{{ asset('image/noImage.jpeg') }}">
        @else
          <img src="{{ asset('storage/stores/'. $store->filename) }}">
        @endif
      </div>
      <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
        <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{ $store->name  }}</h1>
        <p class="mb-2 leading-relaxed">住所：{{ $store->address }}</p>
        <p class="mb-2 leading-relaxed">電話番号：{{ $store->phone }}</p>
        <p class="mb-2 leading-relaxed">ホームページ：{{ $store->url }}</p>
        @if($store->twentyfour)
        <p class="mb-2 leading-relaxed">営業時間：{{ $businessHour }}</p>
        @else
        <p class="mb-2 leading-relaxed">営業時間：{{ $store->open }}〜{{ $store->close }}</p>
        @endif
        <p class="mb-2 leading-relaxed">料金：@if($term) {{ $term }}{{ $store->price }}円 @else 不明です @endif</p>
        <p class="mb-2 leading-relaxed">ビジター：{{ $visitor }}</p>
        <p class="mb-2 leading-relaxed">このジムの登録者：{{ $writer->name }}</p>
        <div class="flex lg:flex-row md:flex-col">
          <button class="mr-2 flex mx-auto text-white bg-lime-500 border-2 border-lime-600 py-2 px-8 focus:outline-none hover:bg-lime-600 rounded text-lg" onclick="location.href='{{ route('comments.create', ['id'=> $store->id]) }}'">このジムの口コミを書く</button>
          <button data-is-like="{{ $user->isLike($store->id) }}" class="like_button flex mx-auto border-2 border-red-500 py-2 px-8 focus:outline-none hover:bg-red-600 hover:text-white rounded text-lg" onclick="toggleLike({{ $store->id }})"></button>
        </div>
      </div>
    </div>
  </section>

  <section class="text-gray-600 body-font py-5">
    <div class="bg-white container container mt-12 px-5 py-12 mx-auto overflow-hidden shadow-sm sm:rounded-lg">
      <div class="flex flex-col text-center w-full mb-5">
        <h1 class="font-semibold sm:text-xl title-font mb-2 text-gray-900">設備情報</h1>
      </div>
      <div class="lg:w-2/3 w-full mx-auto overflow-auto">
        <table class="table-auto w-full text-left whitespace-no-wrap">
          <thead>
            <tr>
              <th class="px-4 py-3 title-font tracking-wider font-semibold text-gray-900 text-lg bg-gray-100 border-x-2 border-y-2 border-gray-200 rounded-tl rounded-bl text-center">プール</th>
              <th class="px-4 py-3 title-font tracking-wider font-semibold text-gray-900 text-lg bg-gray-100 border-x-2 border-y-2 border-gray-200 text-center">サウナ</th>
              <th class="px-4 py-3 title-font tracking-wider font-semibold text-gray-900 text-lg bg-gray-100 border-x-2 border-y-2 border-gray-200 text-center">シャワー</th>
              <th class="px-4 py-3 title-font tracking-wider font-semibold text-gray-900 text-lg bg-gray-100 border-x-2 border-y-2 border-gray-200 text-center">Wi-Fi</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="px-4 py-3 text-lg text-gray-900 font-semibold text-center border-b-2 border-l-2 border-gray-200">{{ $pool }}</td>
              <td class="px-4 py-3 text-lg text-gray-900 font-semibold text-center border-b-2 border-l-2 border-gray-200">{{ $sauna }}</td>
              <td class="px-4 py-3 text-lg text-gray-900 font-semibold text-center border-b-2 border-l-2 border-gray-200">{{ $shower }}</td>
              <td class="px-4 py-3 text-lg text-gray-900 font-semibold text-center border-b-2 border-l-2 border-r-2 border-gray-200">{{ $wifi }}</td>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="flex flex-col text-center w-full mt-10">
        <h1 class="font-semibold sm:text-xl title-font mt-2 text-gray-900">筋トレ器具情報</h1>
      </div>
      <div class="lg:w-2/3 w-full mx-auto overflow-auto">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      【フリーウェイト】
      </h2>
        <table class="table-auto w-full text-left whitespace-no-wrap">
          <thead>
            <tr>
              <th class="px-4 py-3 title-font tracking-wider font-semibold text-gray-900 text-lg bg-gray-100 border-x-2 border-y-2 border-gray-200 rounded-tl rounded-bl text-center">ベンチ</th>
              <th class="px-4 py-3 title-font tracking-wider font-semibold text-gray-900 text-lg bg-gray-100 border-x-2 border-y-2 border-gray-200 text-center">パワーラック</th>
              <th class="px-4 py-3 title-font tracking-wider font-semibold text-gray-900 text-lg bg-gray-100 border-x-2 border-y-2 border-gray-200 text-center">ダンベル最小</th>
              <th class="px-4 py-3 title-font tracking-wider font-semibold text-gray-900 text-lg bg-gray-100 border-x-2 border-y-2 border-gray-200 text-center">ダンベル最大</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="px-4 py-3 text-lg text-gray-900 font-semibold text-center border-b-2 border-l-2 border-gray-200">{{ $store->bench }}台</td>
              <td class="px-4 py-3 text-lg text-gray-900 font-semibold text-center border-b-2 border-l-2 border-gray-200">{{ $store->rack }}台</td>
              <td class="px-4 py-3 text-lg text-gray-900 font-semibold text-center border-b-2 border-l-2 border-gray-200">{{ $store->minimum }}kg</td>
              <td class="px-4 py-3 text-lg text-gray-900 font-semibold text-center border-b-2 border-l-2 border-r-2 border-gray-200">{{ $store->maximum }}kg</td>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="lg:w-2/3 w-full mx-auto overflow-auto mt-5">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      【複合マシン】
      </h2>
        <table class="table-auto w-full text-left whitespace-no-wrap">
          <thead>
            <tr>
              <th class="px-4 py-3 title-font tracking-wider font-semibold text-gray-900 text-lg bg-gray-100 border-x-2 border-y-2 border-gray-200 rounded-tl rounded-bl text-center">スミスマシン</th>
              <th class="px-4 py-3 title-font tracking-wider font-semibold text-gray-900 text-lg bg-gray-100 border-x-2 border-y-2 border-gray-200 text-center">ケーブル</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="px-4 py-3 text-lg text-gray-900 font-semibold text-center border-b-2 border-l-2 border-gray-200">{{ $store->smith }}台</td>              
              <td class="px-4 py-3 text-lg text-gray-900 font-semibold text-center border-b-2 border-l-2 border-r-2 border-gray-200">{{ $store->cable }}台</td>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      
      <div class="lg:w-2/3 w-full mx-auto overflow-auto mt-5">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      【胸・肩トレ】
      </h2>
        <table class="table-auto w-full text-left whitespace-no-wrap">
          <thead>
            <tr>
              <th class="px-4 py-3 title-font tracking-wider font-semibold text-gray-900 text-lg bg-gray-100 border-x-2 border-y-2 border-gray-200 rounded-tl rounded-bl text-center">チェストプレス</th>
              <th class="px-4 py-3 title-font tracking-wider font-semibold text-gray-900 text-lg bg-gray-100 border-x-2 border-y-2 border-gray-200 text-center">ペックフライ</th>
              <th class="px-4 py-3 title-font tracking-wider font-semibold text-gray-900 text-lg bg-gray-100 border-x-2 border-y-2 border-gray-200 text-center">ショルダープレス</th>
              <th class="px-4 py-3 title-font tracking-wider font-semibold text-gray-900 text-lg bg-gray-100 border-x-2 border-y-2 border-gray-200 text-center">サイドレイズ</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="px-4 py-3 text-lg text-gray-900 font-semibold text-center border-b-2 border-l-2 border-gray-200">{{ $store->chestpress }}台</td>
              <td class="px-4 py-3 text-lg text-gray-900 font-semibold text-center border-b-2 border-l-2 border-gray-200">{{ $store->pec }}台</td>
              <td class="px-4 py-3 text-lg text-gray-900 font-semibold text-center border-b-2 border-l-2 border-gray-200">{{ $store->shoulderpress }}台</td>
              <td class="px-4 py-3 text-lg text-gray-900 font-semibold text-center border-b-2 border-l-2 border-r-2 border-gray-200">{{ $store->sideraise }}台</td>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="lg:w-2/3 w-full mx-auto overflow-auto mt-5">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      【背中・腕トレ】
      </h2>
        <table class="table-auto w-full text-left whitespace-no-wrap">
          <thead>
            <tr>
              <th class="px-4 py-3 title-font tracking-wider font-semibold text-gray-900 text-lg bg-gray-100 border-x-2 border-y-2 border-gray-200 rounded-tl rounded-bl text-center">ラットプル</th>
              <th class="px-4 py-3 title-font tracking-wider font-semibold text-gray-900 text-lg bg-gray-100 border-x-2 border-y-2 border-gray-200 text-center">ローイング</th>
              <th class="px-4 py-3 title-font tracking-wider font-semibold text-gray-900 text-lg bg-gray-100 border-x-2 border-y-2 border-gray-200 text-center">アームカール</th>
              <th class="px-4 py-3 title-font tracking-wider font-semibold text-gray-900 text-lg bg-gray-100 border-x-2 border-y-2 border-gray-200 text-center">トライセプス</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="px-4 py-3 text-lg text-gray-900 font-semibold text-center border-b-2 border-l-2 border-gray-200">{{ $store->latpull }}台</td>
              <td class="px-4 py-3 text-lg text-gray-900 font-semibold text-center border-b-2 border-l-2 border-gray-200">{{ $store->rawing }}台</td>
              <td class="px-4 py-3 text-lg text-gray-900 font-semibold text-center border-b-2 border-l-2 border-gray-200">{{ $store->armcurl }}台</td>
              <td class="px-4 py-3 text-lg text-gray-900 font-semibold text-center border-b-2 border-l-2 border-r-2 border-gray-200">{{ $store->triceps }}台</td>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="lg:w-2/3 w-full mx-auto overflow-auto mt-5">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      【脚・腹筋トレ】
      </h2>
        <table class="table-auto w-full text-left whitespace-no-wrap">
          <thead>
            <tr>
              <th class="px-4 py-3 title-font tracking-wider font-semibold text-gray-900 text-base bg-gray-100 border-x-2 border-y-2 border-gray-200 rounded-tl rounded-bl text-center">ハックスクワット</th>
              <th class="px-4 py-3 title-font tracking-wider font-semibold text-gray-900 text-base bg-gray-100 border-x-2 border-y-2 border-gray-200 text-center">レッグエクステンション</th>
              <th class="px-4 py-3 title-font tracking-wider font-semibold text-gray-900 text-base bg-gray-100 border-x-2 border-y-2 border-gray-200 text-center">レッグプレス</th>
              <th class="px-4 py-3 title-font tracking-wider font-semibold text-gray-900 text-base bg-gray-100 border-x-2 border-y-2 border-gray-200 text-center">アブドミナルクランチ</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="px-4 py-3 text-lg text-gray-900 font-semibold text-center border-b-2 border-l-2 border-gray-200">{{ $store->hacksquat }}台</td>
              <td class="px-4 py-3 text-lg text-gray-900 font-semibold text-center border-b-2 border-l-2 border-gray-200">{{ $store->legext }}台</td>
              <td class="px-4 py-3 text-lg text-gray-900 font-semibold text-center border-b-2 border-l-2 border-gray-200">{{ $store->legpress }}台</td>
              <td class="px-4 py-3 text-lg text-gray-900 font-semibold text-center border-b-2 border-l-2 border-r-2 border-gray-200">{{ $store->abcrunch }}台</td>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="lg:w-2/3 w-full mx-auto overflow-auto mt-5">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      【有酸素トレ】
      </h2>
        <table class="table-auto w-full text-left whitespace-no-wrap">
          <thead>
            <tr>
              <th class="px-4 py-3 title-font tracking-wider font-semibold text-gray-900 text-lg bg-gray-100 border-x-2 border-y-2 border-gray-200 rounded-tl rounded-bl text-center">トレッドミル</th>
              <th class="px-4 py-3 title-font tracking-wider font-semibold text-gray-900 text-lg bg-gray-100 border-x-2 border-y-2 border-gray-200 text-center">クロストレーナー</th>
              <th class="px-4 py-3 title-font tracking-wider font-semibold text-gray-900 text-lg bg-gray-100 border-x-2 border-y-2 border-gray-200 text-center">エアロバイク</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="px-4 py-3 text-lg text-gray-900 font-semibold text-center border-b-2 border-l-2 border-gray-200">{{ $store->tread }}台</td>
              <td class="px-4 py-3 text-lg text-gray-900 font-semibold text-center border-b-2 border-l-2 border-gray-200">{{ $store->cross }}台</td>
              <td class="px-4 py-3 text-lg text-gray-900 font-semibold text-center border-b-2 border-l-2 border-r-2 border-gray-200">{{ $store->bike }}台</td>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="flex justify-end pl-4 mt-4 lg:w-2/3 w-full mx-auto">
        <form method="get" action="{{ route('stores.edit', ['id'=>$store->id]) }}">
          <div class="p-2 w-full">
            <button class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">ジム情報を編集する</button>
          </div>
        </form>
        @if($writer->id === $user->id)
        <form method="post" action="{{ route('stores.destroy', ['id'=>$store->id]) }}" id="delete_{{ $store->id }}">
          @csrf
          <div class="p-2 w-full">
            <button onclick="deletePost(this)" class="flex text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg">削除する</a>
          </div>
        </form>
        @endif 
      </div>
    </div>

  </section>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
          <h2 class="flex justify-center sm:text-2xl text-2xl font-medium title-font font-extrabold">{{$store->name}}の口コミ投稿一覧</h2>
          <section class="text-gray-600 body-font overflow-hidden">
            <div class="container px-5 py-20 mx-auto">
              <div class="-my-8 divide-y-2 divide-gray-100">
                @foreach($store->comments as $comment)
                <div class="py-8 flex flex-wrap md:flex-nowrap">
                  <div class="pr-4 md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
                    <span class="font-semibold title-font text-gray-700">{{$comment->user->name}}</span>
                    <span class="mt-1 text-gray-500 text-sm">{{ $comment->created_at }}</span>
                  </div>
                  <div class="md:flex-grow">
                    <h2 class="text-2xl font-medium text-gray-900 title-font mb-2">{{ $comment->title }}</h2>
                    <p class="leading-relaxed">{{ $comment->content }}</p>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>