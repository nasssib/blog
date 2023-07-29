@extends('layouts.app')
@section('content')





<table class="table table-hover">

    <thead>

        <th>image</th>

        <th>name</th>

        <th>
            permission
        </th>

        <th>delete</th>

    </thead>

    <tbody>

        @foreach ($users as $p )

        <tr>
            <td><img src="{{ asset($p->profile->avatar) }}" alt="" width="20px" height="20px" style="border-radius: 50%"></td>
            <td>
                {{$p->name}}
            </td>
            <td>
                @if ($p->admin)
                
                    <a href="{{route('user.not_admin',['id' => $p->id ])}}" class="btn btn-danger">remove admin</a>
                @else

                    <a href="{{route('user.admin',['id' => $p->id ])}}" class="btn btn-success">make admin</a>

                @endif
            </td>

            <td>
                <a href="{{route('post.delete',['id' => $p->id ])}}" class="btn btn-danger">x</a>
            </td>

        </tr>
            
        @endforeach
    </tbody>
</table>

@stop