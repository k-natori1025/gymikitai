<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ジム登録画面
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                  <x-input-error :messages="$errors->get('name')" class="mt-2" />
                  <x-input-error :messages="$errors->get('address')" class="mt-2" />
                  <x-input-error :messages="$errors->get('maximum')" class="mt-2" />
                  <x-input-error :messages="$errors->get('bench')" class="mt-2" />
                  <x-input-error :messages="$errors->get('rack')" class="mt-2" />
                  <x-input-error :messages="$errors->get('smith')" class="mt-2" />
                  <x-input-error :messages="$errors->get('cable')" class="mt-2" />
                  <x-input-error :messages="$errors->get('chestpress')" class="mt-2" />
                  <x-input-error :messages="$errors->get('pec')" class="mt-2" />
                  <x-input-error :messages="$errors->get('shoulderpress')" class="mt-2" />
                  <x-input-error :messages="$errors->get('sideraise')" class="mt-2" />
                  <x-input-error :messages="$errors->get('armcurl')" class="mt-2" />
                  <x-input-error :messages="$errors->get('triceps')" class="mt-2" />
                  <x-input-error :messages="$errors->get('latpull')" class="mt-2" />
                  <x-input-error :messages="$errors->get('rawing')" class="mt-2" />
                  <x-input-error :messages="$errors->get('abcrunch')" class="mt-2" />
                  <x-input-error :messages="$errors->get('hacksquat')" class="mt-2" />
                  <x-input-error :messages="$errors->get('legext')" class="mt-2" />
                  <x-input-error :messages="$errors->get('legpress')" class="mt-2" />
                  <x-input-error :messages="$errors->get('tread')" class="mt-2" />
                  <x-input-error :messages="$errors->get('cross')" class="mt-2" />
                  <x-input-error :messages="$errors->get('bike')" class="mt-2" />
                  <x-input-error :messages="$errors->get('image')" class="mt-2" />
                  <section class="text-gray-600 body-font relative">
                    <form method="post" action="{{ route('stores.store') }}" enctype="multipart/form-data">
                      @csrf
                    <div class="container px-5 py-12 mx-auto">
                      <div class="flex flex-col text-center w-full mb-12">
                        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">ジム新規登録</h1>
                        <p class="lg:w-2/3 mx-auto leading-relaxed text-base">ジム情報の登録にご協力ください。</p>
                      </div>
                      <div class="lg:w-1/2 md:w-2/3 mx-auto">
                      <h2 class="font-semibold text-xl text-gray-800 leading-tight">基本情報</h2>
                        <div class="flex flex-wrap -m-2">
                          <div class="p-4 w-full border-b-2 border-gray-300">
                            <div class="relative">
                              <label for="name" class="leading-7 text-sm text-gray-600">ジム名</label>
                              <!-- oldヘルパ関数でバリデーションで弾かれた後も値を保持 -->
                              <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                          </div>

                          <div class="p-4 w-full border-b-2 border-gray-300">
                            <div class="relative">
                              <label for="address" class="leading-7 text-sm text-gray-600">住所</label>
                              <input type="text" id="address" name="address" value="{{ old('address') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                          </div>

                          <div class="p-4 w-full border-b-2 border-gray-300">
                            <div class="relative">
                              <label for="phone" class="leading-7 text-sm text-gray-600">電話番号</label>
                              <input type="text" id="phone" name="phone" value="{{ old('phone') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                          </div>
                          
                          <div class="p-4 w-full border-b-2 border-gray-300">
                            <div class="relative">
                              <label for="url" class="leading-7 text-sm text-gray-600">ホームページ</label>
                              <input type="url" id="url" name="url" value="{{ old('url') }}" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                          </div>

                          <div class="p-4 w-full border-b-2 border-gray-300">
                            <div class="relative">
                              <label for="twentyfour" class="leading-7 text-sm text-gray-600">営業時間</label></br>
                              <label class="relative inline-flex items-center cursor-pointer">
                              <input type="checkbox" name="twentyfour" id="twentyfour" value="1" {{ old('twentyfour') == 1 ? 'checked' : '' }} class="sr-only peer">
                              <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                              <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">24時間営業</span>
                              </label>
                              <p class="mt-2 mb-2">※24時間営業でない場合は営業時間をご記入ください。 (例)9:00〜23:00<p>
                              <label for="open" class="leading-7 text-sm text-gray-600">営業開始</label>
                              <input type="text" id="open" name="open" value="{{ old('open') }}" class="w-10% bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                              〜
                              <label for="close" class="leading-7 text-sm text-gray-600">営業終了</label>
                              <input type="text" id="close" name="close" value="{{ old('close') }}" class="w-10% bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                          </div>

                          <div class="p-4 w-full border-b-2 border-gray-300">
                            <div class="relative">
                              料金（例）1ヶ月7000円
                              <label for="term" class="leading-7 text-sm text-gray-600"></label><br>
                              <select name="term" class="w-full mb-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                <option value="">利用期間を選択してください</option> 
                                <option value="1" {{ old('term') == 1 ? 'selected' : '' }} >1ヶ月</option> 
                                <option value="2" {{ old('term') == 2 ? 'selected' : '' }} >3ヶ月</option> 
                                <option value="3" {{ old('term') == 3 ? 'selected' : '' }} >半年</option> 
                                <option value="4" {{ old('term') == 4 ? 'selected' : '' }} >年間</option>
                              </select>

                              <label for="price" class="leading-7 text-sm text-gray-600 mt-2"></label>
                                <input type="text" id="price" name="price" value="{{ old('price') }}" class="w-10% mr-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">円
                              </div>
                            </div>
                          </div>

                          <div class="p-4 w-full border-b-2 border-gray-300">
                            <div class="relative">
                              <label for="visitor" class="leading-7 text-sm text-gray-600">ビジター利用</label></br>
                              <label class="relative inline-flex items-center cursor-pointer">
                              <input type="checkbox" name="visitor" id="visitor" value="1" {{ old('visitor') == 1 ? 'checked' : '' }} class="sr-only peer">
                              <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                              <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">ビジター利用可</span>
                              </label>
                            </div>
                          </div>

                          <div class="p-4 w-full border-b-2 border-gray-300">
                            <h2 class="mt-2 mb-2 font-semibold text-xl text-gray-800 leading-tight">設備情報</h2>
                            <div class="relative">
                              <label for="pool" class="leading-7 text-sm text-gray-600">プール</label></br>
                              <label class="relative inline-flex items-center cursor-pointer">
                              <input type="checkbox" name="pool" id="pool" value="1" {{ old('pool') == 1 ? 'checked' : '' }} class="sr-only peer">
                              <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                              <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">プールあり</span>
                              </label>
                            </div>
                            <div class="relative">
                              <label for="sauna" class="leading-7 text-sm text-gray-600">サウナ</label></br>
                              <label class="relative inline-flex items-center cursor-pointer">
                              <input type="checkbox" name="sauna" id="sauna" value="1" {{ old('sauna') == 1 ? 'checked' : '' }} class="sr-only peer">
                              <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                              <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">サウナあり</span>
                              </label>
                            </div>
                            <div class="relative">
                              <label for="shower" class="leading-7 text-sm text-gray-600">シャワー</label></br>
                              <label class="relative inline-flex items-center cursor-pointer">
                              <input type="checkbox" name="shower" id="shower" value="1" {{ old('shower') == 1 ? 'checked' : '' }} class="sr-only peer">
                              <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                              <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">シャワーあり</span>
                              </label>
                            </div>
                            <div class="relative">
                              <label for="wifi" class="leading-7 text-sm text-gray-600">Wi-Fi</label></br>
                              <label class="relative inline-flex items-center cursor-pointer">
                              <input type="checkbox" name="wifi" id="wifi" value="1" {{ old('wifi') == 1 ? 'checked' : '' }} class="sr-only peer">
                              <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                              <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Wi-Fiあり</span>
                              </label>
                            </div>
                          </div>
                          <h2 class="mt-2 mb-2 font-semibold text-xl text-gray-800 leading-tight">筋トレ器具情報</h2>
                          <div class="p-4 w-full border-b-2 border-gray-300">
                            <h2 class="mb-2 text-xl text-gray-800 leading-tight">【フリーウェイト】</h2>
                            <div class="relative">
                              <label for="maximum" class="leading-7 text-sm text-gray-600">ダンベルの最大の重さ</label><br>
                              <input type="text" id="maximum" name="maximum" value="{{ old('maximum') }}" class="w-50% mr-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">kg
                            </div>
                            <div class="relative">
                              <label for="bench" class="leading-7 text-sm text-gray-600">ベンチの数</label><br>
                              <input type="text" id="bench" name="bench" value="{{ old('bench') }}" class="w-50% mr-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">台
                            </div>
                            <div class="relative">
                              <label for="rack" class="leading-7 text-sm text-gray-600">パワーラックの数</label><br>
                              <input type="text" id="rack" name="rack" value="{{ old('rack') }}" class="w-50% mr-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">台
                            </div>
                            <h2 class="mb-2 mt-4 text-xl text-gray-800 leading-tight">【マルチトレーニングマシン】</h2>
                            <div class="relative">
                              <label for="smith" class="leading-7 text-sm text-gray-600">スミスマシンの数</label><br>
                              <input type="text" id="smith" name="smith" value="{{ old('smith') }}" class="w-50% mr-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">台
                            </div>
                            <div class="relative">
                              <label for="cable" class="leading-7 text-sm text-gray-600">ケーブルの数</label><br>
                              <input type="text" id="cable" name="cable" value="{{ old('cable') }}" class="w-50% mr-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">台
                            </div>
                            <h2 class="mb-2 mt-4 text-xl text-gray-800 leading-tight">【胸トレマシン】</h2>
                            <div class="relative">
                              <label for="chestpress" class="leading-7 text-sm text-gray-600">チェストプレスの数</label><br>
                              <input type="text" id="chestpress" name="chestpress" value="{{ old('chestpress') }}" class="w-50% mr-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">台
                            </div>
                            <div class="relative">
                              <label for="pec" class="leading-7 text-sm text-gray-600">ペックフライの数</label><br>
                              <input type="text" id="pec" name="pec" value="{{ old('pec') }}" class="w-50% mr-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">台
                            </div>
                            <h2 class="mb-2 mt-4 text-xl text-gray-800 leading-tight">【肩トレマシン】</h2>
                            <div class="relative">
                              <label for="shoulderpress" class="leading-7 text-sm text-gray-600">ショルダープレスの数</label><br>
                              <input type="text" id="shoulderpress" name="shoulderpress" value="{{ old('shoulderpress') }}" class="w-50% mr-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">台
                            </div>
                            <div class="relative">
                              <label for="sideraise" class="leading-7 text-sm text-gray-600">サイドレイズの数</label><br>
                              <input type="text" id="sideraise" name="sideraise" value="{{ old('sideraise') }}" class="w-50% mr-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">台
                            </div>
                            <h2 class="mb-2 mt-4 text-xl text-gray-800 leading-tight">【腕トレマシン】</h2>
                            <div class="relative">
                              <label for="armcurl" class="leading-7 text-sm text-gray-600">アームカールの数</label><br>
                              <input type="text" id="armcurl" name="armcurl" value="{{ old('armcurl') }}" class="w-50% mr-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">台
                            </div>
                            <div class="relative">
                              <label for="triceps" class="leading-7 text-sm text-gray-600">トライセプスエクステンションの数</label><br>
                              <input type="text" id="triceps" name="triceps" value="{{ old('triceps') }}" class="w-50% mr-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">台
                            </div>
                            <h2 class="mb-2 mt-4 text-xl text-gray-800 leading-tight">【背中トレマシン】</h2>
                            <div class="relative">
                              <label for="latpull" class="leading-7 text-sm text-gray-600">ラットプルの数</label><br>
                              <input type="text" id="latpull" name="latpull" value="{{ old('latpull') }}" class="w-50% mr-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">台
                            </div>
                            <div class="relative">
                              <label for="rawing" class="leading-7 text-sm text-gray-600">ローイングの数</label><br>
                              <input type="text" id="rawing" name="rawing" value="{{ old('rawing') }}" class="w-50% mr-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">台
                            </div>
                            <h2 class="mb-2 mt-4 text-xl text-gray-800 leading-tight">【腹筋トレマシン】</h2>
                            <div class="relative">
                              <label for="abcrunch" class="leading-7 text-sm text-gray-600">アブドミナルクランチの数</label><br>
                              <input type="text" id="abcrunch" name="abcrunch" value="{{ old('abcrunch') }}" class="w-50% mr-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">台
                            </div>
                            <h2 class="mb-2 mt-4 text-xl text-gray-800 leading-tight">【脚トレマシン】</h2>
                            <div class="relative">
                              <label for="hacksquat" class="leading-7 text-sm text-gray-600">ハックスクワットの数</label><br>
                              <input type="text" id="hacksquat" name="hacksquat" value="{{ old('hacksquat') }}" class="w-50% mr-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">台
                            </div>
                            <div class="relative">
                              <label for="legext" class="leading-7 text-sm text-gray-600">レッグエクステンションの数</label><br>
                              <input type="text" id="legext" name="legext" value="{{ old('legext') }}" class="w-50% mr-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">台
                            </div>
                            <div class="relative">
                              <label for="legpress" class="leading-7 text-sm text-gray-600">レッグプレスの数</label><br>
                              <input type="text" id="legpress" name="legpress" value="{{ old('legpress') }}" class="w-50% mr-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">台
                            </div>
                            <h2 class="mb-2 mt-4 text-xl text-gray-800 leading-tight">【有酸素トレマシン】</h2>
                            <div class="relative">
                              <label for="tread" class="leading-7 text-sm text-gray-600">トレッドミルの数</label><br>
                              <input type="text" id="maximum" name="tread" value="{{ old('tread') }}" class="w-50% mr-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">台
                            </div>
                            <div class="relative">
                              <label for="cross" class="leading-7 text-sm text-gray-600">クロストレーナーの数</label><br>
                              <input type="text" id="cross" name="cross" value="{{ old('cross') }}" class="w-50% mr-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">台
                            </div>
                            <div class="relative">
                              <label for="bike" class="leading-7 text-sm text-gray-600">エアロバイクの数</label><br>
                              <input type="text" id="bike" name="bike" value="{{ old('bike') }}" class="w-50% mr-2 bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">台
                            </div>
                          </div>

                          <h2 class="mt-2 mb-2 font-semibold text-xl text-gray-800 leading-tight">店舗画像</h2>
                          <div class="p-4 w-full border-b-2 border-gray-300">
                            <div class="relative">
                              <label for="image" class="leading-7 text-sm text-gray-600">ジムの画像をアップロードしてください</label>
                              <input type="file" id="image" name="image" accept="image/png,image/jpeg,image/jpg" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                            </div>
                          </div>

                          <div class="p-4 w-full">
                            <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">新規登録する</button>
                          </div>
                      </div>
                    </div>
                    </form>
                  </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>