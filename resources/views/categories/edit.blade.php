@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-8">
    <h2 class="app-heading">Редактиране на категория</h2>
    <form method="POST" action="{{ route('categories.update', $category->id) }}" data-parsley-validate>
        @csrf
        <input type="hidden" name="_method" value="PATCH">
        <fieldset class="form-group">
            <label>Заглавие</label>
            <input class="form-control" value="{{ $category->name }}" type="text" name="name" required>
            @if ($errors->has('name'))
                <p class="m-1 alert alert-danger">{{ $errors->first('name') }}</p>
            @endif
        </fieldset>
        <fieldset class="form-group">
            <button class="btn btn-primary" type="submit">Редактирай!</button>
        </fieldset>
    </div>
</div>
@endsection