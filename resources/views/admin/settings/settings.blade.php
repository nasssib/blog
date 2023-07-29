@extends('layouts.app')
@section('content')

@include('admin.includes.errors')

<div class= "panel panel-default">
    <div class= " panel-heading">
       edit blog setting
    </div>
</div>

<div class= "panel-body">
    <form action="{{route('settings.update')}}" method="post" >
    
        {{ csrf_field() }}

       <div class="form-group">
        <label for="name">site name</label>
        <input type="text" name="site_name" value="{{$settings->site_name}}" class="form-control">
       </div>

       <div class="form-group">
        <label for="name">Address</label>
        <input type="text" name="Address" value="{{$settings->address}}" class="form-control">
       </div>

       <div class="form-group">
        <label for="name">countact phone</label>
        <input type="text" name="countact_number" value="{{$settings->contact_number}}" class="form-control">
       </div>

       <div class="form-group">
        <label for="name">countact email</label>
        <input type="text" name="countact_email" value="{{$settings->contact_email}}" class="form-control">
       </div>

       <div class="form-group">

        <button class="btn btn-success" type="submit">update site setting</button>
       </div>
       

    </form>
    
</div>

@stop 