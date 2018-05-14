@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8">
        <h2 class="app-heading">Добавяне на дейност</h2>
        <form action="{{ route('tasks.store') }}" method="POST" data-parsley-validate>
            {{ csrf_field() }}
                <fieldset class="form-group">
                <label>Дейност</label>
                <input class="form-control" type="text" name="title" id="name" required>
                @if ($errors->has('title'))
                    <p class="m-1 alert alert-danger">{{ $errors->first('title') }}</p>
                @endif
            </fieldset>
            <fieldset class="form-group">
                <label for="description">Описание</label>  
                <textarea class="form-control" name="description" cols="10" rows="5" required></textarea>
                @if ($errors->has('description'))
                    <p class="m-1 alert alert-danger">{{ $errors->first('description') }}</p>
                @endif
            </fieldset>
            <fieldset class="form-group">
                <label for="task-date">Дата</label>
                <input class="form-control" type="date" name="start" id="task-date" required>
                @if ($errors->has('start'))
                    <p class="m-1 alert alert-danger">{{ $errors->first('start') }}</p>
                @endif
            </fieldset>
            <fieldset class="form-group">
                <button class="btn btn-primary" type="submit">Запази!</button>
            </fieldset>
        </form>
    </div>
</div>
@endsection