@extends('layouts.admin')

@section('content')
        <div class="p-2">
            <h3 class="bg-success p-2 rounded text-white">Статии</h3>
            <a href="{{ route('articles.create') }}" class="btn btn-primary">Добави статия</a>
            <a href="{{ route('articles.admin') }}" class="btn btn-primary">Управлявай статии</a>
        </div>
        <div class="p-2">
            <h3 class="bg-success p-2 rounded text-white">Агрокалендар</h3>
            <a href="{{ route('tips.create') }}" class="btn btn-primary">Добави съвет</a>
            <a href="{{ route('tips.index') }}" class="btn btn-primary">Управлявай</a>
        </div>
        <div class="p-2">
            <h3 class="bg-success p-2 rounded text-white">Въпроси</h3>
            <a href="{{ route('admin.questions') }}" class="btn btn-primary">Управлявай</a>
        </div>
        <div class="p-2">
            <h3 class="bg-success p-2 rounded text-white">Категории</h3>
            <a href="{{ route('categories.index') }}" class="btn btn-primary">Управлявай категории</a>
        </div>
        <div class="p-2">
            <h3 class="bg-success p-2 rounded text-white">Тагове</h3>
            <a href="{{ route('tags.index') }}" class="btn btn-primary">Управлявай тагове</a>
        </div>
       
@endsection