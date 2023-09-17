<?php

namespace App\Repositories;

use App\Models\Store;

class StoreRepository
{
   // メソッド名先頭にscope。第一引数は$query、第二引数に渡ってくる引数 
  public static function scopeSearch($search_split2)
  {
    foreach( $search_split2 as $value ){
      $query->where('name', 'like', '%' .$value. '%'); 
    } 
    return $query;
  }
  
  public static function findAllStore()
  {
      $store = Store::from('fruits')
              ->select(
                  'fruits.id as fruit_id',
                  'fruits.name as fruit_name')
              ->where('fruits.deleted_at', '=', null)
              ->orderBy('fruits.id','ASC');

      return $store;
  }

    
}
