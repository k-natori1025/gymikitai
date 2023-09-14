<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Services\CheckStoreService;
use App\Http\Requests\StoreRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use InterventionImage;
use App\Services\ImageService;
// use App\Http\Requests\UploadImageRequest;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //全件取得（->get()でコレクション型）
        // $stores = Store::select('id', 'name', 'address', 'price')->get();
        
        //検索結果取得
        $search = $request->search;
        $query = Store::search($search);
        $stores = $query->select('id', 'name', 'address', 'price')->get();

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
    public function store(StoreRequest $request)
    {
        // $user = Auth::user();
        $id = Auth::id(); 

        $imageFile = $request->image;
        if(!is_null($imageFile) && $imageFile->isValid()) {

            // サービスへの切り離し（第二引数はフォルダ名）
            $fileNameToStore = ImageService::upload($imageFile, 'stores');
        }

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
            'user_id' => $id,
        ]);

        session()->flash('flashSuccess', 'ジム情報の登録が完了しました');

        return to_route('stores.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $store = Store::find($id);

        // サービスへの切り離し
        $businessHour = CheckStoreService::checkTwentyfour($store);
        $term = CheckStoreService::checkTerm($store);
        $visitor = CheckStoreService::checkVisitor($store);

        // 登録したユーザー
        $writer = User::find($store->user_id);
        // dd($writer);

        //ログイン中のユーザー
        $user = Auth::user();
        // dd($user);

        return view('stores.show', compact('store', 'businessHour', 'term', 'visitor', 'writer', 'user'));
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

        session()->flash('flashSuccess', 'ジム情報を編集しました');

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
