@extends('layouts.app')

@section('title', 'Природните кътчета на България')

@section('content')
    @if($articles->count() > 0)
    <div class="container">
        <div class="row">
                <div class="col-md-8 mt-1">
        <div class="row">
            <div class="col-md-6">
                <h2 class="app-heading">Търсене</h2>
                <form class="form-inline" action="{{ route('search') }}" method="GET">
                    <div class="col-auto">
                        <input type="text" class="form-control" name="data" id="">
                        <button class="btn btn-primary m-1 ">Търси</button>
                    </div>
                </form>
            </div>
        </div>
        <h2 class="app-heading">Статии</h2>
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
                    <p>{{ mb_strlen(strip_tags(markdown($article->description))) > 100 ? mb_substr(strip_tags(markdown($article->description)), 0, 100).'...' : strip_tags(markdown($article->description)) }} <a href="{{ route('articles.show', $article->id) }}">Прочети повече</a></p>                </div>
        </div>
            @endforeach
            <div class="p-2">{{ $articles->links() }}</div>
            </div>
            @if($categories->count() > 0)
            <div class="col-md-3">
        <h2 class="app-heading">Категории</h2>
        @foreach($categories as $category)
            <a class="badge badge-primary p-2 m-1" href="{{ route('categories.sort', $category->id) }}">{{ $category->name }} ({{ $category->articles->count() }})</a>
        @endforeach
            </div>
    @endif
        </div>
    </div>
    @else
    <p>Все още няма публукувани статии!</p>   
    @endif


   
@endsection