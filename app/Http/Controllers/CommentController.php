<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function savecomment(Request $request){   
     $request->validate([
        'name' => 'required',
        'comment'=> 'required' 
     ]);
     
     $post_id=$request['post_id'];
     $name=$request['name'];
     $comment=$request['comment'];

     $cmt=new Comment();
     $cmt->blog_id=$post_id;
     $cmt->name=$name;
     $cmt->comment=$comment;

     $cmt->save();
     return redirect()->back()->with('success', 'Comment Added successfully!');
    }
}
