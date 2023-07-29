@extends('layouts.app')
@section('content')





<table class="table table-hover">

    <thead>

        <th>image</th>

        <th>title</th>

        <th>edit</th>

        <th>delete</th>

    </thead>

    <tbody>

        @foreach ($posts as $p )

        <tr>
            <td><img src="{{$p->featured}}" alt="{{$p->featured}}" width="20px" height="20px"></td>
            <td>
                {{$p->title}}
            </td>
            <td>
                <a href="{{route('post.edit',['id' => $p->id ])}}" class="btn btn-info">edit</a>
            </td>

            <td>
                <a href="{{route('post.delete',['id' => $p->id ])}}" class="btn btn-danger">x</a>
            </td>

        </tr>
            
        @endforeach
    </tbody>
</table>

@stop