<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ジム情報編集画面
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  <section class="text-gray-600 body-font relative">
                    <form method="post" action="{{ route('stores.update', ['id' => $store->id]) }}">
                      @csrf
                    <div class="container px-5 py-24 mx-auto">
                      <div class="flex flex-col text-center w-full mb-12">
                        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">ジム情報編集</h1>
                        <p class="lg:w-2/3 mx-auto leading-relaxed text-base">現在のジム情報に誤り、追加の情報があれば編集してください。</p>
                      </div>
                      <div class="lg:w-1/2 md:w-2/3 mx-auto">
                        <div class="flex flex-wrap -m-2">
                          <div class="p-2 w-full">
                            <div class="relative">
                              <label for="name" class="leading-7 text-sm text-gray-600">ジム名</label>
                              <input type="text" id="name" name="name" value="{{ $store->name }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                          </div>

                          <div class="p-2 w-full">
                            <div class="relative">
                              <label for="address" class="leading-7 text-sm text-gray-600">住所</label>
                              <input type="text" id="address" name="address" value="{{ $store->address }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                          </div>

                          <div class="p-2 w-full">
                            <div class="relative">
                              <label for="phone" class="leading-7 text-sm text-gray-600">電話番号</label>
                              <input type="text" id="phone" name="phone" value="{{ $store->phone }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                          </div>
                          
                          <div class="p-2 w-full">
                            <div class="relative">
                              <label for="url" class="leading-7 text-sm text-gray-600">ホームページ</label>
                              <input type="url" id="url" name="url" value="{{ $store->url }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                          </div>

                          <div class="p-2 w-full">
                            <div class="relative">
                              営業時間
                              <label class="leading-7 text-sm text-gray-600" id="twentyfour"></label><br>
                              <input type="checkbox" name="twentyfour" id="twentyfour" value="1" @if($store->twentyfour === 1) checked @endif>
                              <label class="leading-7 text-sm text-gray-600" for="twentyfour">24時間営業</label><br>
                              24時間営業でない場合は営業時間をご記入ください<br>
                              <label for="open" class="leading-7 text-sm text-gray-600">営業開始</label>
                              <input type="text" id="open" name="open" class="w-10% bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                              〜
                              <label for="close" class="leading-7 text-sm text-gray-600">営業終了</label>
                              <input type="text" id="close" name="close" class="w-10% bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                          </div>

                          <div class="p-2 w-full">
                            <div class="relative">
                              <label for="term" class="leading-7 text-sm text-gray-600">料金</label><br>
                              <select name="term" class="w-50% bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                <option value="">選択してください</option> 
                                <option value="1" @if($store->term === 1) selected @endif>1ヶ月</option> 
                                <option value="2" @if($store->term === 2) selected @endif>3ヶ月</option> 
                                <option value="3" @if($store->term === 3) selected @endif>半年</option> 
                                <option value="4" @if($store->term === 4) selected @endif>年間</option>
                              </select>

                              <label for="price" class="leading-7 text-sm text-gray-600 mt-2"></label>
                                <input type="text" id="price" name="price" value="{{ $store->price }}" class="w-10% bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">円
                              </div>
                            </div>
                          </div>

                          <div class="p-2 w-full">
                            ビジター利用
                            <div class="relative">
                              <input type="checkbox" id="visitor" name="visitor" value="1" @if($store->visitor === 1) checked @endif>
                              <label class="leading-7 text-sm text-gray-600">ビジター利用可</label>
                            </div>
                          </div>

                          <div class="p-2 w-full">
                            <div class="relative">
                              ダンベルの重さ
                              <label for="maximum" class="leading-7 text-sm text-gray-600"></label><br>
                              <input type="text" id="maximum" name="maximum" value="{{ $store->maximum }}" class="w-50% bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">kg
                            </div>
                          </div>

                          <div class="p-2 w-full">
                            <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">更新する</button>
                          </div>
                    </form>
                  </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>