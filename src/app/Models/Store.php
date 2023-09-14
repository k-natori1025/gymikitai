<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'phone',
        'url',
        'twentyfour',
        'open',
        'close',
        'term',
        'price',
        'visitor',
        'maximum',
        'user_id',
        'filename',
    ];

    // メソッド名先頭にscope。第一引数は$query、第二引数に渡ってくる引数 
    public function scopeSearch($query, $search)
    {
    if($search !== null){
        $search_split = mb_convert_kana($search, 's'); // 全角スペースを半角 
        $search_split2 = preg_split('/[\s]+/', $search_split); //空白で区切る 
        foreach( $search_split2 as $value ){
        $query->where('name', 'like', '%' .$value. '%'); } 
    }
    return $query;
    }
    
    public function user() {
        return $this->belongsTo(User::class);
    }

}
