<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(CommentRequest $request)
    {
        $id = Auth::id(); 

        $comment = Comment::create([
            'content' => $request->content,
            'user_id' => $id,
            'store_id' => $request->store_id,
        ]);

        session()->flash('flashSuccess', 'コメントを投稿しました');

        return to_route('stores.show');
    }
}
