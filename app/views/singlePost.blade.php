@extends('layouts.master')

@section('title')
    {{$thePost->title}}
@stop

@section('headerTitle')
    {{$thePost->title}}
@stop
@section('body')

<div class="container">
    <div class="post">
        <span id="by"><i>Gönderen: {{$thePost->user->username}}</i></span>
        <span id="back"><i>{{HTML::link(URL::to('/'). "/posts", 'Ders Listesi')}}</i></span>
        <div style="clear: both"></div>
        <p>{{$thePost['content']}}</p>
        {{$thePost['video_embed']}}
        {{Form::open(['url'=>'recordComment/'. $thePost->id])}}
        <div class="commentTitle">{{Form::label('Yorum')}}</b> <br/></div>
        @if(Auth::check())
            <?php $text_area_message = "HTML etiketleri kabul edilmemektedir!!!"; ?>
        @else
            <?php $text_area_message = "Yorum yazabilmek için giriş yapmanız gerekir!!!"; ?>
        @endif
        {{Form::textarea('yorum', '', array('placeholder'=> $text_area_message))}} <br/>
        {{Form::submit('Gönder!')}}
        {{Form::close()}}
    </div>
    <div class="comments">
        <h3>Yorumlar ({{count($theComments)}})</h3>
        @if(count($theComments)>0)
            @foreach($theComments as $theComment)
            <span class="commentAuthor">{{{$theComment->user->username}}} diyor ki:</span>
            <div class="singleComment">{{{$theComment['content']}}}</div>
            @endforeach
        @else
            <div class="singleComment" style="text-align:center">Gösterilecek bir yorum yok.. İlk yorumu sen yapabilirsin?</div>
        @endif
    </div>
</div>

@if(Session::has('commentSentMessage'))
<script>
alert("{{Session::get('commentSentMessage')}}");
</script>
@endif

@stop