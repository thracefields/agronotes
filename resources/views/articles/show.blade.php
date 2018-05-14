@extends('layouts.app')

@section('title', 'Природните кътчета на България')

@section('content')
    @if (Session::has('success'))
        <p class="m-1 alert alert-success"><i class="fas fa-check"></i> {{ Session::get('success') }}</p>
    @endif
        <div class="row">
            <div class="col-md-8">
                <div>
                    <h1>{{ $article->name }}</h1>
                    <div>
                        <span class="p-1">
                            <i class="fas fa-sitemap"></i> {{ $article->category->name }}
                        </span>
                        <span class="p-1">
                            <i class="fas fa-eye"></i> {{ $article->page_views }}
                        </span>
                        <span class="p-1">
                            <i class="far fa-clock"></i> {{ $article->created_at->format('d.m.Y G:i') }}</p>                    
                        </span>
                    </div>
                </div>
                    <img class="d-block mx-auto rounded" src="{{ asset('images/uploads/' . $article->image) }}" alt="">
                    <p>@markdown($article->description)</p>
                    @if($article->tags->count() > 0)
                    <h2 class="app-heading">Тагове</h2>
                    @foreach($article->tags as $tag)
                        <a class="p-2 badge badge-pill badge-primary" href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a>
                    @endforeach
                    @endif
                    <div>
                        <h1 class="display-4 app-heading">Коментари</h1>
                    </div>
                    @if($article->comments->count() > 0)
                        @foreach($comments as $comment) 
                        <div class="d-sm-flex p-2">

                            <div class="p-3">
                                {!! Avatar::create($comment->creator->name)->setDimension(80)->setFontSize(40)->toSvg() !!}
                            </div>
                            <div class="p-3">
                                <a class="text-dark font-weight-bold" href="{{ route('profile.show', $comment->creator->id) }}">{{ $comment->creator->name}}</a></strong> | <span class="text-muted">{{ $comment->created_at->format('d.m.Y G:i') }}</span>
                                <h4>{{ $comment->title }}</h4>
                                <p>{{ $comment->body }}</p>
                            </div>
                        </div>
                        @endforeach
                        {{ $comments->links() }}
                    @else
                        <p class="alert alert-info">Все още няма коментари. Напишете първия!</p>
                    @endif
                    @auth
                    <div class="row mx-auto">
                        <div class="col-md-10">
                        <h4 class="app-heading">Добавете коментар</h4>
                        <div class="row">
                        <div class="col-md">
                        {!! Avatar::create(Auth::user()->name)->setDimension(100)->setFontSize(50)->toSvg() !!}

                        </div>
                        <div class="col-md-9">
                    <form action="{{ route('articles.comment', $article->id) }}" method="POST" data-parsley-validate>
                        {{ csrf_field() }}
                        @honeypot('honeypot_name', 'honeypot_time')
                        <fieldset class="form-group">
                            <label>Заглавие</label>
                            <input class="form-control "type="text" name="title" id="title" required>
                            @if ($errors->has('title'))
                                <p class="m-1 alert alert-danger">{{ $errors->first('title') }}</p>
                            @endif
                        </fieldset>
                        <fieldset class="form-group">
                            <textarea class="form-control" name="body" id="body" cols="20" rows="5" required></textarea>
                            @if ($errors->has('body'))
                                <p class="m-1 alert alert-danger">{{ $errors->first('body') }}</p>
                            @endif
                        </fieldset>
                        <fieldset class="form-group">
                            <button class="btn btn-success btn-block" type="submit">Изпрати</button>
                        </fieldset>
                    </form>
                        </div>
                        </div>
                        </div>
                    </div>
                    @endauth
                    @guest
                     <p class="alert alert-danger">Само регистрирани потребители могат да пишат коментари.</p>
                    @endguest
                </div>
        </div>
        
@endsection