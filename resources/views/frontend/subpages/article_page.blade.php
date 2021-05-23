@extends('layouts.frontend')
@section('content')

<!-- Article -->
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="article">
                    <div class="article-title">
                        <p>{{ $article->title }}</p>
                    </div>
                    <div class="article-content">
                        <img src="{{ $article->photos->first()->path ?? $placeholder }}" alt="" class="article-content-img">
                        <div class="article-content-text">
                            <p>{{ $article->content }}</p>
                        </div>
                    </div>
                    <div class="article-likes" id="likes">
                        @auth
                        <a data-toggle="collapse" href=".collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            <button type="button" class="likedButton">
                                Polubienia <span class="badge badge-light px-1">{{ $article->users->count() }}</span>
                            </button>

                            @if($article->isLiked())
                            <a href="{{ route('unlike',['id'=>$article->id, 'type'=>'Article']) }}"><i class="far fa-thumbs-down like"></i></a>
                            @else
                            <a href="{{ route('like',['id'=>$article->id, 'type'=>'Article']) }}"><i class="far fa-thumbs-up like"></i></a>
                            @endif
                        </a>
                        <div class="collapse collapseExample" id="collapseExample">
                            <ul class="list-inline">
                                @foreach($article->users as $user)
                                <div class="wrap" style="float: left;">
                                    <li><a href="{{ route('person',['id' => $user->id]) }}"><img title="{{ $user->FullName }}" class="profile-img" src="{{ $user->photos->first()->path ?? $placeholder}}" alt="..."> </a></li>
                                </div>
                                @endforeach
                            </ul>
                        </div>
                        @else
                        <a href="{{ route('login') }}">
                            <button type="button" class="likedButton">
                                Zaloguj się
                            </button>
                        </a>
                        @endauth

                    </div>
                </div>
            </div>
        </div>
        @if (session('error'))
        <div class="alert alert-danger mt-2">
            {{ session('error') }}
        </div>
        @endif
        @if (session('success'))
        <div class="alert alert-success mt-2">
            {{ session('success') }}
        </div>
        @endif
        <div class="row">
            <div class="comments" id="cmms">
                @foreach($article->comments as $comment)
                <?php
                $how_many_comments = $article->comments->count();
                ?>
                @endforeach
                <p class="comments-title">Komentarze <span class="comments-title-count">({{ $how_many_comments ?? ''}})</p>
                @auth
                @foreach($article->comments as $comment)
                <div class="comments-wrap">
                    <div class="comment-person">
                        <a title="{{ $comment->user->FullName }}" href="{{ route('person', ['id' => $comment->user->id])}}">
                            <img class="profile-img" src="{{ $comment->user->photos->first()->path ?? $placeholder }}" alt="...">
                        </a>
                    </div>
                    <div class="comment-content">
                        <p>{{ $comment->content }}</p>
                    </div>
                </div>
                @endforeach
                @else
                @foreach($article->comments as $comment)
                <div class="comments-wrap">
                    <div class="comment-person">
                        <a href="{{ route('login')}}">
                            <img class="media-object" width="50" height="50" src="{{ $comment->user->photos->first()->path ?? $placeholder }}" alt="...">
                        </a>
                    </div>
                    <div class="comment-content">
                        <p>{{ $comment->content }}</p>
                    </div>
                </div>
                @endforeach
                @endauth
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @auth
                <a data-toggle="collapse" href=".collapseExample2" aria-expanded="false" aria-controls="collapseExample2">
                    <button type="button" class="addCommentButton">
                        Skomentuj
                    </button>
                </a>
                <div class="collapse collapseExample2">

                    <form method="POST" action="{{ route('addComment',['article_id'=>$article->id, 'Article']) }}" class="form-horizontal" enctype="multipart/form-data">
                        <fieldset>

                            <div class=" form-group">

                                <div class="col-md-12">
                                    <textarea required name="content" class="form-control" rows="3" id="textArea"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-10 col-lg-offset-2">
                                    <button type="submit" class="sendButton">Wyslij</button>
                                </div>
                            </div>
                        </fieldset>
                        {{ csrf_field() }}
                    </form>

                </div>
                @else
                <a href="{{ route('login') }}">
                    <button type="button" class="addCommentButton">
                        Zaloguj się
                    </button>
                </a>
                @endauth
            </div>
        </div>
    </div>
</div>

@endsection('content')
