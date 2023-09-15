<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Store;
use App\Models\Comment;
use App\Models\Like;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // リレーション
    public function stores() {
        return $this->hasMany(Store::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function likes() {
        return $this->belongsToMany(Store::class, 'likes', 'user_id', 'store_id');
    }

    //この投稿に対して既にlikeしたかどうかを判別する
    public function isLike($storeId)
    {
      return $this->likes()->where('store_id',$storeId)->exists();
    }

    //isLikeを使って、既にlikeしたか確認したあと、いいねする（重複させない）
    public function like($storeId)
    {
      if($this->isLike($storeId)){
        //もし既に「いいね」していたら何もしない
      } else {
        $this->likes()->attach($storeId);
      }
    }

    //isLikeを使って、既にlikeしたか確認して、もししていたら解除する
    public function unlike($storeId)
    {
      if($this->isLike($storeId)){
        //もし既に「いいね」していたら消す
        $this->likes()->detach($storeId);
      } else {
      }
    }

}
