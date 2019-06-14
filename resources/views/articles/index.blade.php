@extends('layouts.index')

@section('content')

    @if($message = session('message'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    <h2 class="page-header">
        مقالات سایت
    </h2>

    <!-- First Blog Post -->
    @foreach( $articles as $article )

        <div>
            <h3>
                <a href="{{ route('article.show' , ['article' => $article->slug ]) }}">{{ $article->title }}</a>
                @if(auth()->check())
                    <small><a style="color: #999;" href="{{ route('article.edit' , ['article' => $article->slug ]) }}">ویرایش مقاله</a></small>
                @endif
            </h3>
            <p class="lead">
                ارسال شده توسط <a href="index.php">{{ $article->user->name }}</a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span>ارسال شده در تاریخ  {{ jdate($article->created_at)->ago() }}</p>
            <ul>
                @foreach( $article->categories()->pluck('name') as $cate)
                    <li><a href="/article/category/{{ $cate }}">{{ $cate }}</a></li>
                @endforeach
            </ul>
            <hr>
            <img class="img-responsive" src="http://placehold.it/900x300" alt="">
            <hr>
            <p>{!! $article->body !!}</p>
            <a class="btn btn-primary" href="{{ route('article.show' , ['article' => $article->slug ]) }}">ادامه  مطلب <span class="glyphicon glyphicon-chevron-left"></span></a>
        </div>

        @if(! $loop->last )
            <hr>
        @endif

    @endforeach


    <!-- Pager -->
    <div style="text-align:center;">
        {!! $articles->render() !!}
    </div>

@endsection