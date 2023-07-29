@extends('layouts.app')
@section('content')

@include('admin.includes.errors')

<div class= "panel panel-default">
    <div class= " panel-heading">
       create a new tag
    </div>
</div>

<div class= "panel-body">
    <form action="{{route('tag.store')}}" method="post" >
    
        {{ csrf_field() }}

       <div class="form-group">
        <label for="name">tag</label>
        <input type="text" name="tag" class="form-control">
       </div>

       <div class="form-group">

        <button class="btn btn-success" type="submit">store tag</button>
       </div>
       

    </form>
    
</div>

@stop 