<?php

namespace App\Repositories;

use App\Models\Store;

class StoreRepository
{
   // メソッド名先頭にscope。第一引数は$query、第二引数に渡ってくる引数 
  public function findAll($search_split2)
  {
    $query = Store::select('id', 'name', 'address', 'price', 'filename')->withCount('likes', 'comments');
    foreach( $search_split2 as $value ){
      $query->where('name', 'like', '%' .$value. '%'); 
    } 
    return $query->get();
  }
  
  public function create($data) {
    $store = Store::create($data);    
  }

    
}
