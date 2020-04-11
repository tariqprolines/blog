<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Comment;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts=Blog::orderBy('id','Desc')->paginate(2);
        $posts=Blog::orderBy('id','Desc')->withCount(['comments'])->paginate(2);
        return view('welcome',['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('new');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        $title=$request['title'];
        $description=$request['description'];

        $post=new Blog();
        $post->title=$title;
        $post->description=$description;

        $post->save();
        return redirect('/')->with('success',"Post created successfuly");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Blog::find($id);
        $cmts=Comment::where('blog_id','=',$id)->get();
        return view('post_details',['post' => $post, 'cmts' => $cmts]);
    }

    public function search(Request $request){
        $search = $request -> search;
        $posts  = Blog::where('title','like','%'.$search.'%')
                  ->orWhere('description','like','%'.$search.'%')->paginate(2);
        $posts->appends(['search' => $search]);          
        return view('welcome',['posts'=>$posts]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
