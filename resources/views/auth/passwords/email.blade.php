@extends('layouts.app')

@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2 class="app-heading">Възстановяване на парола</h2>

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}" data-parsley-validate>
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label>Електронна поща</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                 @if ($errors->has('email'))
                                    <p class="m-1 alert alert-danger">{{ $errors->first('email') }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Възстановяване!
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
    </div>
</div>
@endsection
