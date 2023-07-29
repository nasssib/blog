@extends('layouts.app')
@section('content')

@include('admin.includes.errors')

<div class= "panel panel-default">
    <div class= " panel-heading">
       create a new category
    </div>
</div>

<div class= "panel-body">
    <form action="{{route('category.store')}}" method="post" >
    
        {{ csrf_field() }}

       <div class="form-group">
        <label for="name">name</label>
        <input type="text" name="name" class="form-control">
       </div>

       <div class="form-group">

        <button class="btn btn-success" type="submit">store category</button>
       </div>
       

    </form>
    
</div>

@stop 