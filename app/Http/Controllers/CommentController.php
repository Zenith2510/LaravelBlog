<?php

namespace App\Http\Controllers;

use App\Models\Comment;
// use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    //
    // public function create()
    // {
    //     $comment = new Comment;
    //     $comment->content = request()->content;
    //     $comment->article_id = request()->article_id;
    //     $comment->user_id = auth()->user()->id;
    //     $comment->save();
    //     return back();
    // }
    public function create(Request $request)
    {
        $request->validate(['content' => 'required']);
        $comment = new Comment();
        $comment->content = $request->content;
        $comment->article_id = $request->article_id;
        $comment->user_id = auth()->user()->id;
        $comment->save();
        return back();
    }


    // public function delete($id)
    // {
    //     $comment = Comment::find($id);
    //     if ($comment->user_id == auth()->user()->id) {
    //         $comment->delete();
    //         return back();
    //     } else {
    //         return back()->with('error', 'Unauthorize');
    //     }
    // }

    public function delete($id)
    {
        $comment = Comment::find($id);
        if (Gate::allows('delete-comment', $comment)) {
            $comment->delete();
            return back()->with('info', 'Comment Deleted');
        }
        return back()->with('info', 'Unauthorize to delete');
    }



    // public function delete($id)
    // {
    //     $comment = Comment::find($id);
    //     if (Gate::denies('comment-delete', $comment)) {
    //         return back()->with('error', 'Unauthorize');
    //     }
    //     $comment->delete();
    //     return back();
    // }

}
