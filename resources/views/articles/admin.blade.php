@extends('layouts.admin')

@section('content')
<a href="{{ route('articles.create') }}" class="btn btn-primary float-right mb-4"><i class="fas fa-plus"></i> Добави статия</a>
@if (count($articles) === 0)
<p>Няма резултати.</p>
@else
<div class="m-2">
<table class="table table-hover table-responsive-sm">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Заглавие</th>
            <th scope="col">Съдържание</th>
            <th scope="col"><i class="fas fa-calendar-alt"></i></th>
            <th scope="col"><i class="fas fa-eye"></i></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($articles as $article)
            <tr>
                <td scope="row">{{ $article->id }}</td>
                <td>{{ $article->name }}</td>
                <td>{{ mb_strlen(strip_tags(markdown($article->description))) > 100 ? mb_substr(strip_tags(markdown($article->description)), 0, 100).'...' : strip_tags(markdown($article->description)) }}</td>
                <td>{{ $article->created_at->format('j.m.Y') }}</td>
                <td><a class="btn btn-primary" target="_blank" href="{{ route('articles.show', $article->id)  }}">Виж</a></td>
                <td><div><a class="btn btn-success mb-2" href="{{ route('articles.edit', $article->id) }}"><i class="fas fa-edit"></i></a></div>
                    <form action="{{ route('articles.destroy', $article->id) }}" method="POST">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button class="btn btn-danger" type="submit"><i class="far fa-window-close"></i></button>
                    </form>
                    </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $articles->links() }}
</div>
         
@endif

   
@endsection