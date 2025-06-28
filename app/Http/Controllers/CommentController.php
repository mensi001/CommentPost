<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'content' => 'nullable|string',
        'post_id' => 'required|exists:posts,id',
        'parent_comment_id' => 'nullable|exists:comments,id',
    ]);

    $depth = 1;
    if ($request->parent_comment_id) {
        $parent = Comment::findOrFail($request->parent_comment_id);
        if (!$parent->canReply()) {
            return back()->with('error', 'Cannot reply beyond depth limit.');
        }
        $depth = $parent->depth + 1;
    }

    Comment::create([
        'content' => $request->content,
        'post_id' => $request->post_id,
        'parent_comment_id' => $request->parent_comment_id,
        'depth' => $depth,
    ]);

    return back();
}
}
