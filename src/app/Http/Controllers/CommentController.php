<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;

class CommentController extends Controller
{

    public function create(string $id)
    {
        $storeId = $id;
        return view('comments.create', compact('storeId'));
    }

    public function store(Request $request)
    {
        $userId = Auth::id(); 

        $inputs = request()->validate([
            'content' => 'required|max:16384'
        ]);

        dd($request);

        $comment = Comment::create([
            'content' => $inputs['content'],
            'user_id' => $userId,
            'store_id' => $request->store->id,
        ]);

        session()->flash('flashSuccess', 'コメントを投稿しました');

        return to_route('stores.show');
    }
}
