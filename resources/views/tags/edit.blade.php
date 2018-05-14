@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-8">
    <h2>Редактиране на таг</h2>
    <form method="POST" action="{{ route('tags.update', $tag->id) }}" data-parsley-validate>
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PATCH">
        <fieldset class="form-group">
            <label>Заглавие</label>
            <input class="form-control" value="{{ $tag->name }}" type="text" name="name" required>
            @if ($errors->has('name'))
                <p class="m-1 alert alert-danger">{{ $errors->first('name') }}</p>
            @endif
        </fieldset>
        <fieldset class="form-group">
            <button class="btn btn-primary btn-block" type="submit">Редактирай!</button>
        </fieldset>
    </div>
</div>
@endsection