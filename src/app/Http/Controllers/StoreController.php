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
        $stores = $query->select('id', 'name', 'address', 'price', 'filename')->withCount('likes', 'comments')->get();

        $likes = Like::all();

        return view('stores.index', compact('stores', 'likes'));
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
            'pool' => $request->pool,
            'sauna' => $request->sauna,
            'shower' => $request->shower,
            'wifi' => $request->wifi,
            'bench' => $request->bench,
            'rack' => $request->rack,
            'maximum' => $request->maximum,
            'smith' => $request->smith,
            'cable' => $request->cable,
            'chestpress' => $request->chestpress,
            'pec' => $request->pec,
            'shoulderpress' => $request->shoulderpress,
            'sideraise' => $request->sideraise,
            'armcurl' => $request->armcurl,
            'triceps' => $request->triceps,
            'latpull' => $request->latpull,
            'rawing' => $request->rawing,
            'abcrunch' => $request->abcrunch,
            'hacksquat' => $request->hacksquat,
            'legext' => $request->legext,
            'legpress' => $request->legpress,
            'tread' => $request->tread,
            'cross' => $request->cross,
            'bike' => $request->bike,
            'user_id' => $id,
            'filename' => $fileNameToStore,
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

        $imageFile = $request->image;
        if(!is_null($imageFile) && $imageFile->isValid()) {
            $fileNameToStore = ImageService::upload($imageFile, 'stores');
        } else {
            $fileNameToStore = $store->filename;
        }

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
        $store->pool = $request->pool;
        $store->sauna = $request->sauna;
        $store->shower = $request->shower;
        $store->wifi = $request->wifi;
        $store->bench = $request->bench;
        $store->rack = $request->rack;
        $store->smith= $request->smith;
        $store->cable = $request->cable;
        $store->chestpress = $request->chestpress;
        $store->pec = $request->pec;
        $store->shoulderpress = $request->shoulderpress;
        $store->sideraise = $request->sideraise;
        $store->armcurl = $request->armcurl;
        $store->triceps = $request->triceps;
        $store->latpull = $request->latpull;
        $store->rawing = $request->rawing;
        $store->abcrunch = $request->abcrunch;
        $store->hacksquat = $request->hacksquat;
        $store->legext = $request->legext;
        $store->legpress = $request->legpress;
        $store->tread = $request->tread;
        $store->cross = $request->cross;
        $store->bike = $request->bike;
        $store->filename = $fileNameToStore;

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
