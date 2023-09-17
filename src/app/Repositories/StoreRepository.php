<?php

namespace App\Repositories;

use App\Models\Store;

class StoreRepository
{
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
