@if (count($errors)>0)

<ul class="list-group">
@foreach ($errors->all() as $e)

<li class="list-group-item text-danger">{{$e}}</li>
    
@endforeach
 
</ul>
    
@endif