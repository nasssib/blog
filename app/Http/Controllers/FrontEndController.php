<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Setting;
use App\Tag;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
        return view('index')
                ->with('title',Setting::first()->site_name)
                ->with('categories',Category::take(4)->get())
                ->with('first_post',Post::orderBy('created_at','desc')->first())
                ->with('second_post',Post::orderBy('created_at','desc')->skip(1)->take(1)->get()->first())
                ->with('third_post',Post::orderBy('created_at','desc')->skip(2)->take(1)->get()->first())
                ->with('laravel',Category::find(1))
                ->with('food',Category::find(4))
                ->with('setting',Setting::first());
    }

    public function singlepost($slug)
    {
       $post= Post::where('slug',$slug)->first();
       $next=Post::where('id', '>', $post->id)->min('id');
       $perv=Post::where('id', '<', $post->id)->max('id');

       return view('single')->with('post',$post)
                            ->with('title',$post->title)
                            ->with('setting',Setting::first())
                            ->with('categories',Category::take(4)->get())
                            ->with('tags',Tag::take(4)->get())
                            ->with('next',Post::find($next))
                            ->with('prev',Post::find($perv));
    }

    public function category($id)
    {
        $category=Category::find($id);

        return view('category') ->with('category',$category)
                                ->with('title',$category->name)
                                ->with('setting',Setting::first())
                                ->with('categories',Category::take(4)->get());
    }

    public function tag($id)
    {
        $tag=Tag::find($id);

        return view('tag')  ->with('tag',$tag)
                            ->with('setting',Setting::first())
                            ->with('categories',Category::take(4)->get());
    }
} 
