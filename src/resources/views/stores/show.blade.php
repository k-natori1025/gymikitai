<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ジム詳細画面
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  <section class="text-gray-600 body-font relative">
                    <div class="container px-5 py-24 mx-auto">
                      <div class="flex flex-col text-center w-full mb-12">
                        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">{{ $store->name }}</h1>
                        <p class="lg:w-2/3 mx-auto leading-relaxed text-base">このジムの登録者:{{ $writer->name }}</p> 
                      </div>
                      <div class="lg:w-1/2 md:w-2/3 mx-auto">
                        <div class="p-2 w-full">
                          <div class="relative">
                            @if(empty($store->filename))
                              <img src="{{ asset('image/noImage.jpeg') }}">
                            @else
                              <img src="{{ asset('storage/stores/'. $store->filename) }}"> 
                            @endif  
                          </div>
                        </div>
                      </div>
                      <div class="p-2 w-full">
                        <button class="flex mx-auto text-white bg-lime-500 border-0 py-2 px-8 focus:outline-none hover:bg-lime-600 rounded text-lg"
                          onclick="location.href='{{ route('comments.create', ['id'=> $store->id]) }}'">このジムの口コミを書く</button>
                      </div>
                      <div class="p-2 w-full">
                      @if($user->isLike($store->id))
                        <button class="flex mx-auto text-red-500 bg-white border-2 border-red-500 py-2 px-8 focus:outline-none hover:bg-red-600 hover:text-white rounded text-lg"
                          onclick="unlike({{ $store->id }})">イキタイ解除</button>
                      @else
                      <button class="flex mx-auto text-white bg-red-500 border-2 border-red-500 py-2 px-8 focus:outline-none hover:bg-red-600 hover:text-white rounded text-lg"
                          onclick="like({{ $store->id }})">イキタイ</button>
                      @endif
                      </div>
                      </div>
                      <div class="lg:w-1/2 md:w-2/3 mx-auto">
                        <div class="flex flex-wrap -m-2">
                          <div class="p-2 w-full">
                            <div class="relative">
                              <label for="name" class="leading-7 text-sm text-gray-600">ジム名</label>
                              <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $store->name }}</div>
                            </div>
                          </div>

                          <div class="p-2 w-full">
                            <div class="relative">
                              <label for="address" class="leading-7 text-sm text-gray-600">住所</label>
                              <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $store->address }}</div>
                            </div>
                          </div>

                          <div class="p-2 w-full">
                            <div class="relative">
                              <label for="phone" class="leading-7 text-sm text-gray-600">電話番号</label>
                              @if($store->phone)
                                <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $store->phone }}</div>
                              @endif
                            </div>
                          </div>
                          
                          <div class="p-2 w-full">
                            <div class="relative">
                              <label for="url" class="leading-7 text-sm text-gray-600">ホームページ</label>
                              @if($store->url)
                                <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $store->url }}</div>
                              @endif
                            </div>
                          </div>

                          <div class="p-2 w-full">
                            <div class="relative">
                              営業時間
                              <!-- <label class="leading-7 text-sm text-gray-600"></label><br> -->
                              @if($store->twentyfour)
                                <div class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $businessHour }}</div>
                                <!-- <label class="leading-7 text-sm text-gray-600" for="all_day">24時間営業</label><br> -->
                              @else
                                <label for="open" class="leading-7 text-sm text-gray-600">営業開始</label>
                                <div class="w-10% bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $store->open }}</div>
                                <label for="close" class="leading-7 text-sm text-gray-600">営業終了</label>
                                <div class="w-10% bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $store->close }}</div>
                              @endif
                            </div>
                          </div>

                          <div class="p-2 w-full">
                            <div class="relative">
                              <label for="term" class="leading-7 text-sm text-gray-600">料金</label><br>
                              @if($term)
                              <div class="w-full mb-3 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $term }}</div>
                              @endif  

                              @if($store->price)
                                <div class="w-10% bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $store->price }}円</div>
                              @endif
                            </div>
                          </div>

                          <div class="p-2 w-full">
                            ビジター利用
                            <div class="relative">
                              <div id="visitor" name="visitor" value="1">{{ $visitor }}</div>
                            </div>
                          </div>

                          <div class="p-2 w-full">
                            <div class="relative">
                              ダンベルの重さ
                              <label for="max_weight" class="leading-7 text-sm text-gray-600"></label><br>
                              @if($store->maximum)
                                <div class="w-50% bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">{{ $store->maximum }}kg</div>
                              @endif
                            </div>
                          </div>
                          <form method="get" action="{{ route('stores.edit', ['id'=>$store->id]) }}">
                          <div class="p-2 w-full">
                            <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">ジム情報を編集する</button>
                          </div>
                          </form>

                          @if($writer->id === $user->id)
                          <form method="post" action="{{ route('stores.destroy', ['id'=>$store->id]) }}" id="delete_{{ $store->id }}" >
                            @csrf
                          <div class="p-2 w-full">
                            <button onclick="deletePost(this)" class="flex mx-auto text-white bg-red-500 border-0 py-2 px-8 focus:outline-none hover:bg-red-600 rounded text-lg">削除する</a>
                          </div>
                          </form>
                         @endif
                          <!-- <form method="post" action="{{ route('stores.destroy', [ 'id' => $store->id ])}}" id="delete_{{ $store->id }}">
                            @csrf
                            <a href="#" data-id="{{ $store->id }}" onclick="deletePost(this)">削除する</a>
                          </form> -->
                  </section>
                </div>
            </div>
        </div>
    </div>

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
                  <!-- <a class="text-indigo-500 inline-flex items-center mt-4">Learn More -->
                    <!-- <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M5 12h14"></path>
                      <path d="M12 5l7 7-7 7"></path>
                    </svg> -->
                  <!-- </a> -->
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