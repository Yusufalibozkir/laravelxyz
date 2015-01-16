@extends('layouts.master')

@section('title')
    Laravel Dersleri $Sayfa-> {{$thePosts->getCurrentPage()}}
@stop

@section('headerTitle')
    Laravel Dersleri $Sayfa-> {{$thePosts->getCurrentPage()}}
@stop

@section('body')

<div class="container">
     <div class="post">
        @foreach($thePosts->getCollection()->all() as $thePost)
            <h1>{{ HTML::link('posts/id/'. $thePost['id'], $thePost['title']) }}</h1>
            <p>{{$thePost['content']}}</p>
             <!-- If you want to show video to call $thePost['video_embed'] here -->
        @endforeach
        <div class="pagination">{{$thePosts->links()}}</div>
    </div>
</div>
@stop
