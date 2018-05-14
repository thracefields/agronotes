@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-8">
        <h2 class="app-heading">Добави съвет</h2>
        <form action="{{ route('tips.store') }}" method="POST" data-parsley-validate>
            {{ csrf_field() }}
            <fieldset class="form-group">
                <label>Месец</label>
                <select class="form-control" name="month" required>
                    <option value="1">Януари</option>
                    <option value="2">Февруари</option>
                    <option value="3">Март</option>
                    <option value="4">Април</option>
                    <option value="5">Май</option>
                    <option value="6">Юни</option>
                    <option value="7">Юли</option>
                    <option value="8">Август</option>
                    <option value="9">Септември</option>
                    <option value="10">Октомври</option>
                    <option value="11">Ноември</option>
                    <option value="12">Декември</option>
                </select>
            </fieldset>
            <fieldset class="form-group">
                <label>Съвет</label>
                <textarea class="form-control" name="body" cols="30" rows="10" required></textarea>
            </fieldset>
            <fieldset class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Добави!</button>
            </fieldset>
        </form>
    </div>
</div>
@endsection