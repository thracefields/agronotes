@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2 class="app-heading">Вход за администратори</h2>
                <div>
        <form class="form-horizontal" method="POST" action="{{ route('admin.login') }}" data-parsley-validate>
            {{ csrf_field() }}
            <fieldset>
                <fieldset class="form-group">
                    <label for="email" class="col-md-4 control-label">Имейл</label>
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                    </div>
                    @if ($errors->has('email'))
                        <p class="m-1 alert alert-danger">{{ $errors->first('email') }}</p>
                    @endif
                </fieldset>
                <fieldset class="form-group">
                    <label for="password" class="col-md-4 control-label">Парола</label>
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password" required>
                </div>
                    @if ($errors->has('password'))
                    <p class="m-1 alert alert-danger">{{ $errors->first('password') }}</p>
                    @endif
                </fieldset>
                <fieldset class="form-group">
                    <label for="cb" class="col-md-4 control-label">
                        <input id="cb" type="checkbox"> Запомни ме
                    </label>
                </fieldset>
                <fieldset class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary btn-block">Влез!</button>
                    </div>
                </fieldset>
            </fieldset>
        </form>
@endsection
