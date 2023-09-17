<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;
use App\Models\Store;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function store($storeId) {
        Auth::user()->like($storeId);
        return 'ok!';

        session()->flash('flashSuccess', 'いいねをしました');
    }

    public function destroy($storeId) {
        Auth::user()->unlike($storeId);
        return 'ok!';
    }
}
