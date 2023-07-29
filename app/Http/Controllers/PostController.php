<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Category;
use App\Post;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;
use App\Tag;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        if($categories->count()==0)
        {
            Session::flash('info','you to create some categories');
            
            return redirect()->back();
        }
        return view('admin.posts.create')->with('categories',$categories)
                                         ->with('tags',Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[

            'title'=>'required',
            'featured'=>'required',
            'content'=>'required',
            'category_id'=>'required'
        ]);

        $featured=$request->featured;
        $new_name=time().$featured->getClientOriginalName();
        $featured->move('uploads/posts',$new_name);

        $post = Post::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'featured'=>'uploads/posts/'.$new_name,
            'category_id'=>$request->category_id,
            'slug'=>str_slug($request->title),
            'uesr_id'=>Auth::id()
        ]);

        $post->tags()->attach($request->tags);

        Session::flash('success','post created');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        return view('admin.posts.edit')
        ->with('post',$post)
        ->with('categories', Category::all())
        ->with('tags',Tag::all());
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
       $post = Post::find($id);
       $post->delete();
       Session::flash('success','the post just trashed');

       return redirect()->back();
    }

    public function trashed()
    {
        $post = Post::onlyTrashed()->get();

        return view('admin.posts.trashed')->with('posts',$post);
    }

    public function kill($id)
    {
        $post= Post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();
        Session::flash('success','the post killed');

        return redirect()->back();
    }

    public function restore($id)
    {
        $post= Post::withTrashed()->where('id',$id)->first();
        $post->restore();
        Session::flash('success','the post restored');

        return redirect()->back();
    }
}
