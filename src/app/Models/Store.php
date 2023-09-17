<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;
use App\Models\Like;

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
        'pool',
        'sauna',
        'shower',
        'wifi',
        'bench',
        'rack',
        'smith',
        'cable',
        'chestpress',
        'pec',
        'shoulderpress',
        'sideraise',
        'armcurl',
        'triceps',
        'latpull',
        'rawing',
        'abcrunch',
        'hacksquat',
        'legext',
        'legpress',
        'tread',
        'cross',
        'bike',
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

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function likes() {
        return $this->belongsToMany(User::class, 'likes', 'store_id', 'user_id');
    }

}
