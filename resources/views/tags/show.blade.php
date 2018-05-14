@extends('layouts.app')

@section('content')
<h2 class="app-heading">Таг {{ $tag->name }}</h2>
@if ($articles->count() > 0)
    <div class="container">
        <div class="row">
                <div class="col-md-9">
            @foreach($articles as $article)
            <div class="row p-2 align-items-center">
                <div class="col-md-4">
                    <img class="rounded" src="{{ asset('images/uploads/' . $article->image) }}" alt="">
                </div>
                <div class="col-md">
                    <h4>{{ $article->name }}</h4>
                        @isset($article->category->name)
                        <h6 class="text-muted font-italic">{{ $article->category->name }}</h6>
                        @endisset
                    <p>{{ mb_strlen(strip_tags(markdown($article->description))) > 100 ? mb_substr(strip_tags(markdown($article->description)), 0, 100).'...' : strip_tags(markdown($article->description)) }} <a href="{{ route('articles.show', $article->id) }}">Прочети повече</a></p>
                        <!-- <div class="col"><i class="far fa-edit"></i> {{ date('j.m.Y', strtotime($article->updated_at)) }}</div> -->
                </div>
        </div>
            @endforeach

            <div class="p-2">{{ $articles->links() }}</div>
            </div>
        </div>
    </div>
@else
    <p class="alert alert-info">Все още няма статии, в които този таг да е използван.</p>        
@endif
@endsection