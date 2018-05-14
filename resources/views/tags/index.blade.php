@extends('layouts.admin')

@section('content')
    @if (Session::has('success'))
        <p class="m-1 alert alert-success"><i class="fas fa-check"></i> {{ Session::get('success') }}</p>
    @endif
        <div class="row mt-2">
            <div class="col-md-7"> 
            @if($tags->count() > 0)
                <h2 class="app-heading">Тагове</h2>
                <table class="table table-hover table-responsive-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Име</th>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tags as $tag)
                            <tr>
                                <td>{{ $tag->id }}</td>
                                <td><a class="text-dark font-weight-bold" href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a> ({{ $tag->articles->count()}})</td>
                                <td><a class="btn btn-success mb-2" href="{{ route('tags.edit', $tag->id) }}"><i class="fas fa-edit"></i></a></td>
                                <td><form action="{{ route('tags.destroy', $tag->id) }}" method="POST">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button class="btn btn-danger" type="submit"><i class="far fa-window-close"></i></button>
                    </form></td>
                            </tr>
                        @endforeach
                    </tbody>
                    </div>
                </table>
            {{ $tags->links() }}
            @else
            <p class="alert alert-info">Все още няма добавени тагове. Добавете първия!</p>
            @endif
            </div>
            <div class="col-md">
                <form action="{{ route('tags.store') }}" method="POST">
                    {{ csrf_field() }}
                    <h2 class="app-heading">Нов таг</h2>
                    <fieldset class="form-group">
                        <label>Име</label>
                        <input class="form-control" type="text" name="name">
                        @if ($errors->has('name'))
                            <p class="m-1 alert alert-danger">{{ $errors->first('name') }}</p>
                        @endif
                    </fieldset>
                    <fieldset>
                        <button class="mb-2 btn btn-primary btn-block" type="submit">Добави!</button>
                    </fieldset>
                </form>
            </div>
        </div>
@endsection