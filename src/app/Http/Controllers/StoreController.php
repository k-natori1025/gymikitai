<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Services\CheckStoreService;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // ->get()でコレクション型にする
        $stores = Store::select('id', 'name', 'address', 'price')->get();

        // compactでviewにデータを渡す
        return view('stores.index', compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('stores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // バリデーションをかける
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);

        // 登録
        $store = Store::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'url' => $request->url,
            'twentyfour' => $request->twentyfour,
            'open' => $request->open,
            'close' => $request->close,
            'term' => $request->term,
            'price' => $request->price,
            'visitor' => $request->visitor,
            'maximum' => $request->maximum,
        ]);

        return to_route('stores.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $store = Store::find($id);

        // サービスへの切り離し→コントローラーをスリムに
        $businessHour = CheckStoreService::checkTwentyfour($store);

        $term = CheckStoreService::checkTerm($store);

        $visitor = CheckStoreService::checkVisitor($store);

        return view('stores.show', compact('store', 'businessHour', 'term', 'visitor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $store = Store::find($id);
        return view('stores.edit', compact('store'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $store = Store::find($id);

        $store->name = $request->name;
        $store->address = $request->address;
        $store->phone = $request->phone;
        $store->url = $request->url;
        $store->twentyfour = $request->twentyfour;
        $store->open = $request->open;
        $store->close = $request->close;
        $store->term = $request->term;
        $store->price = $request->price;
        $store->visitor = $request->visitor;
        $store->maximum = $request->maximum;

        $store->save();

        return to_route('stores.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $store = Store::find($id);
        $store->delete();

        return to_route('stores.index');

    }
}
