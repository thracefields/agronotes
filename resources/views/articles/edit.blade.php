@extends('layouts.admin')

@section('content')
<div class="container">
        <div class="row">
        <div class="col-md-8">
        <h2 class="app-heading">Редактиране на статия</h2>
    <form method="POST" action="{{ route('articles.update', $article->id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PATCH">

        <fieldset class="form-group">
            <label class="control-label" for="name">Заглавие</label>
            <input class="form-control" value="{{ $article->name }}" type="text" name="name">
            @if ($errors->has('name'))
                <p class="m-1 alert alert-danger">{{ $errors->first('name') }}</p>
            @endif
        </fieldset>
        <fieldset class="form-group">
            <label class="control-label" for="featured_image">Изображение</label>
            <input class="form-control-file" type="file" name="featured_image" id="featured_image">
            @if ($errors->has('featured_image'))
                <p class="m-1 alert alert-danger">{{ $errors->first('featured_image') }}</p>
            @endif
        </fieldset>
        <fieldset class="form-group">
            <label class="control-label" for="category">Категория</label>
            <select class="form-control" name="category" id="category">
            @foreach($categories as $category)
                <option {{ $article->category_id === $category->id ? 'selected' : ''}} value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
            </select>
        </fieldset>
        <fieldset class="form-group">
            <label>Тагове</label>
            <select class="form-control js-multiple-select" name="tags[]" multiple="multiple">
            @foreach($tags as $tag)
                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
            </select>
        </fieldset>
        <fieldset class="form-group">
            <label class="control-label" for="description">Съдържание</label>
            <textarea class="form-control" name="description" id="" cols="30" rows="10">{{ $article->description }}</textarea>
            @if ($errors->has('description'))
                <p class="m-1 alert alert-danger">{{ $errors->first('description') }}</p>
            @endif
        </fieldset>
        <fieldset class="form-group">
            <button class="btn btn-primary" type="submit">Редактирай!</button>
        </fieldset>
        <script>
            var inscrybmde = new InscrybMDE({
                element: $("#description")[0],
                toolbarTips: false,
                toolbar: ['bold', 'italic', 'heading', 'unordered-list','ordered-list', 'link'],
                status: false
            });

            $(document).ready(function() {
                $('.js-multiple-select').select2();
                $('.js-multiple-select').select2().val( {!! json_encode($article->tags()->allRelatedIds()) !!}).trigger('change');
            });
        </script>
 @endsection