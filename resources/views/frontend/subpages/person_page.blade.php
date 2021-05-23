@extends('layouts.frontend')
@section('content')

<!-- Person -->
<div class="container text-center person services-body">
    <img src="{{ $user->photos->first()->path ?? $placeholder}}" alt="" class="person-img">
    <div class="col-12 person-name text-center">
        <h2>{{ $user->FullName }}</h2>
    </div>
    <div class="col-sm-12 buffer">
        <div class="buffer-top">Polubionych artykułów: {{ $user->liked_articles->count() }}</div>
        <ul class="list-group">
            @foreach($user->articles as $article)
            <li class="list-group-item ">
                <a href="{{ route('article',['id'=>$article->id]) }}"> {{ $article->title }}</a>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="col-sm-12 buffer">
        <div class="buffer-top">Dodanych komentarzy: {{ $user->comments->count() }}</div>
        <ul class="list-group">
            @foreach($user->comments as $comment)
            <li class="list-group-item ">
                {{ $comment->content }}
                <a href="{{ $comment->commentable->link }}"><span class="font-weight-bold">Link do artykułu</span></a>
            </li>
            @endforeach
        </ul>
    </div>
</div>

@endsection('content')
