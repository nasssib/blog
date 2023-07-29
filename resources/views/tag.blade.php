@extends('layouts.frontend')

@section('content')

<div class="stunning-header stunning-header-bg-lightviolet">
    <div class="stunning-header-content">
        <h1 class="stunning-header-title">Tag:  {{$tag->tag}}</h1>
    </div>
</div>

<div class="container">
    <div class="row medium-padding120">
        <main class="main">
            
            <div class="row">
                        <div class="case-item-wrap">
                            
                            @foreach ( $tag->posts as $p )

                            
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="case-item">
                                    <div class="case-item__thumb">
                                        <img src="{{$p->featured}}" alt="our case">
                                    </div>
                                    <a href="{{ route('single.post', ['slug'=>$p->slug]) }}"><h6 class="case-item__title">{{$p->title}}</h6></a>
                                </div>
                            </div>
                                
                            @endforeach

                        </div>
            </div>

            <!-- End Post Details -->
            <br>
            <br>
            <br>

        </main>
    </div>
</div>
@endsection