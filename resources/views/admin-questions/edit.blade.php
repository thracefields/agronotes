@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-8">
            <div class="p-2">
                <p class="bg-success rounded text-white m-0 p-2">{{ $question->body }}</p>
                <p class="text-right m-0 mb-1"><strong>Зададен от:</strong> <a href="{{ route('profile.show',$question->user->profile->id) }}">{{ $question->user->name }}</a></p>
            </div>
        <form action="{{ route('admin.questions.update', $question->id) }}" method="POST" data-parsley-validate>
            {{ csrf_field() }}

            <fieldset class="form-group">
                <label>Отговор</label>
                <textarea class="form-control" name="response" cols="20" rows="5" required></textarea>
                @if ($errors->has('response'))
                    <p class="m-1 alert alert-danger">{{ $errors->first('response') }}</p>
                @endif
            </fieldset>
            <fieldset class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Oтговори!</button>
            </fieldset>
        </form>
    </div>
</div>
@endsection