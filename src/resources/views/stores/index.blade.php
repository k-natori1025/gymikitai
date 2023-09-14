<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ジム一覧
        </h2>
        <form method="get" action="{{ route('stores.index') }}">
          <input type="text" name="search" placeholder="検索">
          <button class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">検索する</button>
        </form>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
        
                  <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                  <table class="table-auto w-full text-left whitespace-no-wrap">
                    <thead>
                      <tr>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">ID</th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">ジム名</th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">住所</th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">値段</th>
                        <th class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">詳細</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($stores as $store)
                      <tr>
                        <td class="px-4 py-3">{{ $store->id }}</td>
                        <td class="px-4 py-3">{{ $store->name }}</td>
                        <td class="px-4 py-3">{{ $store->address }}</td>
                        <td class="px-4 py-3">{{ $store->price }}</td>
                        <td class="px-4 py-3"><button class="flex mx-auto text-white bg-lime-500 border-0 py-2 px-8 focus:outline-none hover:bg-lime-600 rounded text-lg"
                          onclick="location.href='{{ route('stores.show', ['id'=> $store->id]) }}'">詳細を見る</button>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>