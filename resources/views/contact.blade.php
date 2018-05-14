@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8">
        <h2 class="app-heading">Обратна връзка</h2>
            <form method="POST" action="{{ route('contact.send') }}" data-parsley-validate>
                {{ csrf_field() }}

                <fieldset class="form-group">
                    <label>Имейл</label>
                    <input class="form-control" type="email" value="{{ Auth::user()->email }}" name="email" required>
                    @if ($errors->has('email'))
                        <p class="m-1 alert alert-danger">{{ $errors->first('email') }}</p>
                    @endif
                </fieldset>
                <fieldsey class="form-group">
                    <label>Относно</label>
                    <input class="form-control" type="text" name="subject" required>
                    @if ($errors->has('subject'))
                        <p class="m-1 alert alert-danger">{{ $errors->first('subject') }}</p>
                    @endif
                </fieldset>
                <fieldset>
                <fieldset class="form-group">
                    <label>Съобщение</label>
                    <textarea class="form-control" name="message" rows="10" required></textarea>
                    @if ($errors->has('message'))
                        <p class="m-1 alert alert-danger">{{ $errors->first('message') }}</p>
                    @endif
                </fieldset>
                <fieldset class="form-group">
                    <button type="submit" class="btn btn-primary">Изпрати!</button>
                </fieldset>
            </form>
        </div>
    </div>
@endsection