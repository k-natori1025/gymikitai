<x-app-layout>
    <section class="text-gray-600 body-font">
    <div class="container mx-auto flex px-5 py-10 items-center justify-center flex-col">
        <img class="lg:w-2/6 md:w-3/6 w-5/6 object-cover object-center rounded" alt="hero" src="/image/logo2.png"">
        <div class="text-center lg:w-2/3 w-full">
        <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">ジムイキタイとは？</h1>
        <p class="mb-2 leading-relaxed">ジムに通ってみたいけど、設備情報がわからない。実際に通っている人の意見を聞きたい。</p>
        <p class="mb-2 leading-relaxed">出張先でジムに行きたいけど、どんな器具があるかわからない。やりたい種目ができなかったらどうしよう…。</p>
        <p class="mb-2 leading-relaxed">そんなことを思ったことはないでしょうか？</p>
        <p class="mb-2 leading-relaxed">ジムイキタイでは、ジムの設備情報、器具の種類、そのジムに行かれたお客さんの口コミを見ることができます。</p>
        <div class="flex justify-center">
            <button class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg" onclick="location.href='{{ route('stores.index') }}'">さっそくジムを検索する</button>
        </div>
        </div>
    </div>
    </section>
</x-app-layout>
