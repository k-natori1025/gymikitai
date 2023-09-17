<?php

namespace App\Services;

use App\Models\Store;
use App\Repositories\StoreRepository;

class StoreService
{

  // メソッド名先頭にscope。第一引数は$query、第二引数に渡ってくる引数 
  // public static function scopeSearch($query, $search)
  // {
  // if($search !== null){
  //     $search_split = mb_convert_kana($search, 's'); // 全角スペースを半角 
  //     $search_split2 = preg_split('/[\s]+/', $search_split); //空白で区切る 
  //     foreach( $search_split2 as $value ){
  //     $query->where('name', 'like', '%' .$value. '%'); } 
  // }
  // return $query;
  // }

  public static function searchStore($search) {
    if($search !== null){
      $search_split = mb_convert_kana($search, 's'); // 全角スペースを半角 
      $search_split2 = preg_split('/[\s]+/', $search_split); //空白で区切る 
    }
    return StoreRepository::scopeSearch($search_split2);
  }

  public static function addStore($request, $id, $fileNameToStore) {
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
  }

  public static function modifyStore($store, $request, $fileNameToStore) {
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
  }

  
}