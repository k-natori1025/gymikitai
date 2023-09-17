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
