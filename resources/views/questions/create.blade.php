@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-8">
    <h2>Задайте своя въпрос</h2>
        <form action="{{ route('questions.store') }}" method="POST" data-parsley-validate>
            @csrf
            <fieldset class="form-group">
                <label>Bъпрос</label>
                <textarea class="form-control" name="body" rows="5" required></textarea>
                @if ($errors->has('body'))
                    <p class="m-1 alert alert-danger">{{ $errors->first('body') }}</p>
                @endif
            </fieldset>
            <fieldset class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Изпрати!</button>
            </fieldset>
        </form>
    </div>
</div>
@endsection