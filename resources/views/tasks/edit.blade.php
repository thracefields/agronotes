@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8">
    <h2 class="app-heading">Редактиране на дейност</h2>
    <form method="POST" action="{{ route('tasks.update', $task->id) }} " enctype="multipart/form-data" data-parsley-validate>
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PATCH">
        <fieldset class="form-group">
            <label>Дейност</label>
            <input class="form-control" value="{{ $task->title }}" type="text" name="title" required>
            @if ($errors->has('title'))
                <p class="m-1 alert alert-danger">{{ $errors->first('title') }}</p>
            @endif
        </fieldset>
        <fieldset class="form-group">
            <label>Описание</label>
            <textarea class="form-control" name="description" id="" cols="30" rows="10" required>{{ $task->description }}</textarea>
            @if ($errors->has('description'))
                <p class="m-1 alert alert-danger">{{ $errors->first('description') }}</p>
            @endif
        </fieldset>
        <fieldset class="form-group">
            <label>Дата</label>
            <input class="form-control" type="date" name="start" value="{{ $task->start }}" required>
            @if ($errors->has('start'))
                <p class="m-1 alert alert-danger">{{ $errors->first('start') }}</p>
            @endif
        </fieldset>
        <fieldset class="form-group">
            <button class="btn btn-primary btn-block" type="submit">Редактирай!</button>
        </fieldset>
    </div>
</div>
@endsection

