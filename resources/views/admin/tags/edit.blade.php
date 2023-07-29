@extends('layouts.app')
@section('content')

@include('admin.includes.errors')

<div class= "panel panel-default">
    <div class= " panel-heading">
       edit  tag
    </div>
</div>

<div class= "panel-body">
    <form action="{{route('tag.update',['id'=>$tag->id])}}" method="post" >
    
        {{ csrf_field() }}

       <div class="form-group">
        <label for="name">tag</label>
        <input type="text" name="tag" class="form-control" value="{{$tag->tag}}">
       </div>

       <div class="form-group">

        <button class="btn btn-success" type="submit">update tag</button>
       </div>
       

    </form>
    
</div>

@stop 