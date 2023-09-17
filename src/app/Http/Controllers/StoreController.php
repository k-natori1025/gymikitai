<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Services\CheckStoreService;
use App\Http\Requests\StoreRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Like;
use Illuminate\Support\Facades\Storage;
use InterventionImage;
use App\Services\ImageService;
use App\Services\StoreService;
// use App\Http\Requests\UploadImageRequest;

class StoreController extends Controller
{
    private $service;
    public function __construct()
    {
        $this->service = new StoreService();
    }
    
    public function index(Request $request)
    {
        //全件取得（->get()でコレクション型）
        // $stores = Store::select('id', 'name', 'address', 'price')->get();
        
        //検索結果取得
        $search = $request->search;
        $stores = $this->service->searchStores($search);

        $likes = Like::all();

        return view('stores.index', compact('stores', 'likes'));
    }

    public function create()
    {
        return view('stores.create');
    }

    public function store(StoreRequest $request)
    {
        // $user = Auth::user();
        $userId = Auth::id(); 

        $imageFile = $request->image;
        if(!is_null($imageFile) && $imageFile->isValid()) {
            // サービスへの切り離し（第二引数はフォルダ名）
            $fileNameToStore = ImageService::upload($imageFile, 'stores');
        } else {
            $fileNameToStore = '';
        }

        // 登録(サービス層への切り離し)
        $store = $this->service->addStore($request, $userId, $fileNameToStore);

        session()->flash('flashSuccess', 'ジム情報の登録が完了しました');

        return to_route('stores.index');
    }

    public function show(string $id)
    {
        $store = Store::find($id);

        // サービスへの切り離し
        $businessHour = CheckStoreService::checkTwentyfour($store);
        $term = CheckStoreService::checkTerm($store);
        $visitor = CheckStoreService::checkVisitor($store);
        $pool = CheckStoreService::checkPool($store);
        $sauna = CheckStoreService::checkSauna($store);
        $shower = CheckStoreService::checkShower($store);
        $wifi = CheckStoreService::checkWifi($store);

        // 登録したユーザー
        $writer = User::find($store->user_id);

        //ログイン中のユーザー
        $user = Auth::user();
    
        return view('stores.show', compact('store', 'businessHour', 'term', 'visitor', 'writer', 'user', 'pool', 'sauna', 'shower', 'wifi'));
    }

    public function edit(string $id)
    {
        $store = Store::find($id);
        return view('stores.edit', compact('store'));
    }

    public function update(Request $request, string $id)
    {
        $store = Store::find($id);

        $imageFile = $request->image;
        if(!is_null($imageFile) && $imageFile->isValid()) {
            $fileNameToStore = ImageService::upload($imageFile, 'stores');
        } else {
            $fileNameToStore = $store->filename;
        }

        $store = $this->service->modifyStore($store, $request, $fileNameToStore);

        session()->flash('flashSuccess', 'ジム情報を編集しました');

        return to_route('stores.index');

    }

    public function destroy(string $id)
    {
        $store = Store::find($id);
        $store->delete();

        return to_route('stores.index');

    }
}
