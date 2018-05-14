@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-8">
        <h2 class="app-heading">Редактиране на съвет</h2>
        <form action="{{ route('tips.update', $tip->id) }}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PATCH">
            <fieldset class="form-group">
                <label>Месец</label>
                <select class="form-control" name="month" required>
                    <option value="1" {{ $tip->month === 1 ? 'selected' : ''}}>Януари</option>
                    <option value="2" {{ $tip->month === 2 ? 'selected' : ''}}>Февруари</option>
                    <option value="3" {{ $tip->month === 3 ? 'selected' : ''}}>Март</option>
                    <option value="4" {{ $tip->month === 4 ? 'selected' : ''}}>Април</option>
                    <option value="5" {{ $tip->month === 5 ? 'selected' : ''}}>Май</option>
                    <option value="6" {{ $tip->month === 6 ? 'selected' : ''}}>Юни</option>
                    <option value="7" {{ $tip->month === 7 ? 'selected' : ''}}>Юли</option>
                    <option value="8" {{ $tip->month === 8 ? 'selected' : ''}}>Август</option>
                    <option value="9" {{ $tip->month === 9 ? 'selected' : ''}}>Септември</option>
                    <option value="10" {{ $tip->month === 10 ? 'selected' : ''}}>Октомври</option>
                    <option value="11" {{ $tip->month === 11 ? 'selected' : ''}}>Ноември</option>
                    <option value="12" {{ $tip->month === 12 ? 'selected' : ''}}>Декември</option>
                </select>
                @if ($errors->has('month'))
                    <p class="m-1 alert alert-danger">{{ $errors->first('month') }}</p>
                @endif
            </fieldset>
            <fieldset class="form-group">
                <label>Съвет</label>
                <textarea class="form-control" name="body" cols="30" rows="10" required>{{ $tip->body }}</textarea>
                @if ($errors->has('body'))
                    <p class="m-1 alert alert-danger">{{ $errors->first('body') }}</p>
                @endif
            </fieldset>
            <fieldset class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Редактирай!</button>
            </fieldset>
        </form>
    </div>
</div>
@endsection

