@extends('layouts.app')
@section('content')

@include('admin.includes.errors')

<div class= "panel panel-default">
    <div class= " panel-heading">
      update post: {{$post->title}}
    </div>
</div>

<div class= "panel-body">
    <form action="{{route('post.update',['id' => $post->id])}}" method="post" enctype="multipart/form-data">
    
        {{ csrf_field() }}

       <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" value="{{$post->title}}">
       </div>

       <div class="form-group">
        <label for="featured">Featured Image</label>
        <input type="file" name="featured" class="form-control">
       </div>


       <div class="form-group">
           <label for="category">select a category</label>
           <select name="category_id" id="category" class="form-control">
               @foreach ($categories as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                   
               @endforeach
           </select>
       </div>

       <div class="form-group">
        <label for="tags">select tags</label>
           <div class="checkbox">
               
               @foreach ($tags as $tag )
                
                    <label><input type="checkbox" name="tags[]" value="{{$tag->id}}"
                        @foreach ($post->tags as $t)
                            @if ($tag->id == $t->id)
                                checked
                            @endif
                        @endforeach
                        
                        >{{$tag->tag}}</label>

                @endforeach
           </div>
       </div>

       <div class="form-group">
        <label for="Content">Content</label>
        <textarea name="content" id="" cols="5" rows="5 " class="form-control">{{$post->content}}</textarea>
       </div>

       <div class="form-group">
           <div class="text-center">
               <button class="btn btn-success" type="submit"> update post </button>
           </div>
       </div>

    </form>
    
</div>

@stop 