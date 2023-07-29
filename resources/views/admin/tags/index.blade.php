@extends('layouts.app')
@section('content')





<table class="table table-hover">

    <thead>

        <th>tag name</th>

        <th>editing</th>

        <th>deleting</th>

    </thead>

    <tbody>

        @foreach ($tags as $c )

        <tr>
            <td>{{$c->tag }}</td>
            <td>
                <a href="{{route('tag.edit',['id'=> $c->id])}}" class="btn btn-xs btn-info">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a>
            </td>
            <td>
                <a href="{{route('tag.delete',['id'=> $c->id])}}" class="btn btn-xs btn-danger">
                    <span class="glyphicon glyphicon-trash"></span>
                </a>
            </td>
        </tr>
            
        @endforeach
    </tbody>
</table>

@stop