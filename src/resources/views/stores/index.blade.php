<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <!-- ジム一覧 -->
        </h2>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <form method="get" action="{{ route('stores.index') }}">
            <input type="text" name="search" placeholder="ジムを検索する" class="w-2/3 rounded border border-gray-500">
            <button class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">検索する</button>
          </form>
        </div>
    </x-slot>

    <!-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg"> -->
      <section class="text-white body-font">
        <div class="container px-5 py-24 mx-auto">
          <div class="flex flex-wrap -m-4">
            @foreach($stores as $store)
            <div class="p-4 md:w-1/3">
              <div class="h-full border-2 border-gray-500 border-opacity-60 rounded-lg overflow-hidden">
                @if(empty($store->filename))
                  <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="{{ asset('image/noImage.jpeg') }}">
                @else
                  <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="{{ asset('storage/stores/'. $store->filename) }}"> 
                @endif  
                <div class="p-6">
                  <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">{{ $store->address }}</h2>
                  <h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{ $store->name }}</h1>
                  <!-- <p class="leading-relaxed mb-3">Photo booth fam kinfolk cold-pressed sriracha leggings jianbing microdosing tousled waistcoat.</p> -->
                  <div class="flex items-center flex-wrap ">
                    <button class="flex mx-auto text-white bg-lime-500 border-0 py-2 px-8 focus:outline-none hover:bg-lime-600 rounded text-lg"
                            onclick="location.href='{{ route('stores.show', ['id'=> $store->id]) }}'">詳細を見る</button>
                    <span class="text-gray-400 mr-3 inline-flex items-center lg:ml-auto md:ml-0 ml-auto leading-none text-sm pr-3 py-1 border-r-2 border-gray-200">
                    イキタイ数 : {{ $store->likes_count }}
                    </span>
                    <span class="text-gray-400 inline-flex items-center leading-none text-sm">
                      <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
                      </svg>{{ $store->comments_count }}
                    </span>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </section>
    <!-- </div> -->
</x-app-layout>