@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-md-8 col-md-offset-2">
            <h2 class="app-heading">Регистрация</h2>
            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-12 col-md-4 control-label">Име</label>

                            <div class="col-12 col-md-8">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-12 col-md-4 control-label">Имейл</label>

                            <div class="col-12 col-md-8">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-12 col-md-4 control-label">Парола</label>

                            <div class="col-12 col-md-8">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <p class="m-1 alert alert-danger"> {{ $errors->first('password') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-12 col-md-4 control-label">Повторете паролата</label>

                            <div class="col-12 col-md-8">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-12 col-offset-0 col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Регистрирай се!
                                </button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
</div>
@endsection
