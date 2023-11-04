<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Comment;
class AdminCommentController extends Controller
{
     public function index(){
        return view('admin.comments.index', [
            'comments' =>Comment::paginate(50)

        ]);
    }
    public function destroy(Comment $comment){

    $comment->delete();
 return redirect()->route('admin.comments.index')->with('success', 'Comment has been updated');
}
}
