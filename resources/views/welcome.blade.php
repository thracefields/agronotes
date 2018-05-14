@extends('layouts.app')

@section('content')
@if (Session::has('success'))
    <p class="m-1 alert alert-success"><i class="fas fa-check"></i> {{ Session::get('success') }}</p>
@endif

<div class="jumbotron">
  <h1 class="display-4 segoe-ui d-none d-md-inline-block">Агробележник за младия земеделец</h1>
  <h4>Пръв помощник за навлизащите в сферата на растениевъдството и животновъдството младежи.</h4>
  <hr class="my-4">
  <p>Приложението позволява на потребителя да води статистика за мероприятията, които отглежданите от него култури са преминали, разполагайки ги във времето.</p>
  <p>Съветите за всеки месец помагат на младия земеделец да планира работата си в градината или на полето.</p>
</div>
<div class="col-md-11 mx-auto">
    <h1 class="display-4 app-heading">Най-четени</h1>
    <div class="row">
    @foreach($featuredArticles as $featuredArticle)
        <div class="col-md">
            <img class="rounded" src="{{ asset('images/uploads/' . $featuredArticle->image) }}" alt="">
            <h3>{{ $featuredArticle->name }}</h3>
            <p>{{ mb_strlen(strip_tags(markdown($featuredArticle->description))) > 100 ? mb_substr(strip_tags(markdown($featuredArticle->description)), 0, 100).'...' : strip_tags(markdown($featuredArticle->description)) }} <a href="{{ route('articles.show', $featuredArticle->id) }}">Повече</a></p></p>
        </div>
    @endforeach
    </div>
    <h1 class="display-4 app-heading">Последни</h1>
    <div class="row justify-content-end p-2">
    <div class="col-md-3">
        <a href="{{ route('articles.index') }}" class="btn btn-primary btn-block">Всички статии</a>
    </div>
</div>
    @foreach($articles as $article)
            <div class="row p-2 align-items-center">
                <div class="col-md-3">
                    <img class="rounded" src="{{ asset('images/uploads/' . $article->image) }}" alt="">
                </div>
                <div class="col-md-9">
                    <h4>{{ $article->name }}</h4>
                        @isset($article->category->name)
                        <h6 class="text-muted font-italic">{{ $article->category->name }}</h6>
                        @endisset
                    <p>{{ mb_strlen(strip_tags(markdown($article->description))) > 100 ? mb_substr(strip_tags(markdown($article->description)), 0, 100).'...' : strip_tags(markdown($article->description)) }} <a href="{{ route('articles.show', $article->id) }}">Прочети повече</a></p>
                </div>
        </div>
    @endforeach
</div>

@endsection