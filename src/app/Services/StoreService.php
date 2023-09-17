<?php

namespace App\Services;

use App\Models\Store;

class StoreService
{
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

  
}