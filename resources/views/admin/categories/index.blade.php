@extends('layouts.app')
@section('content')





<table class="table table-hover">

    <thead>

        <th>category name</th>

        <th>editing</th>

        <th>deleting</th>

    </thead>

    <tbody>

        @foreach ($categories as $c )

        <tr>
            <td>{{$c->name }}</td>
            <td>
                <a href="{{route('category.edit',['id'=> $c->id])}}" class="btn btn-xs btn-info">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a>
            </td>
            <td>
                <a href="{{route('category.delete',['id'=> $c->id])}}" class="btn btn-xs btn-danger">
                    <span class="glyphicon glyphicon-trash"></span>
                </a>
            </td>
        </tr>
            
        @endforeach
    </tbody>
</table>

@stop