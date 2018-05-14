@extends('layouts.admin')

@section('content')
<div class="container">
        <div class="row">
        <div class="col-md-8">
        <h2 class="app-heading">Създаване на статия</h2>
    <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
        <fieldset class="form-group">
            <label>Заглавие</label>
            <input class="form-control" type="text" name="name">
            @if ($errors->has('name'))
                <p class="m-1 alert alert-danger">{{ $errors->first('name') }}</p>
            @endif
        </fieldset>
        <fieldset class="form-group">
            <label>Изображение</label>
            <input class="form-control-file" type="file" name="featured_image" id="featured_image">
            @if ($errors->has('featured_image'))
                <p class="m-1 alert alert-danger">{{ $errors->first('featured_image') }}</p>
            @endif
        </fieldset>
        <fieldset class="form-group">
            <label>Категория</label>
            <select class="form-control" name="category" id="category">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
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
            <label>Съдържание</label>
            <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
            @if ($errors->has('description'))
                <p class="m-1 alert alert-danger">{{ $errors->first('description') }}</p>
            @endif
        </fieldset>
        <fieldset class="form-group">
            <button class="btn btn-primary btn-block" type="submit">Публикувай!</button>
        </fieldset>
    </form>
    </div>
    </div>
    </div>
<script>
    var inscrybmde = new InscrybMDE({
        element: $("#description")[0],
        toolbarTips: false,
        toolbar: ['bold', 'italic', 'heading', 'unordered-list','ordered-list', 'link'],
        status: false
    });

    $(document).ready(function() {
        $('.js-multiple-select').select2();
    });
</script>
 @endsection