@extends('layouts.app')

@section('content')
<h2 class="app-heading">Резултати от търсене</h2>
@if($articles->count() > 0)
<p class="alert alert-info">Намерени статии: <strong>{{ $articles->count() }}</strong>.</p>
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
@else 
<p class="alert alert-info">Няма намерени резултати.</p>
@endif
@endsection