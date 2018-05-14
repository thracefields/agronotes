@extends('layouts.app')

@section('content')
<div class="row mx-auto p-2">
    <div class="col-md-3">
        {!! Avatar::create(Auth::user()->name)->setDimension(250)->toSvg() !!}
    </div>
    <div class="col-md-7">
        <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data" data-parsley-validate>
            {{ csrf_field() }}
            <fieldset class="form-group">
                <label>Име</label>
                <input type="text" class="form-control" value="{{ Auth::user()->name }}" readonly>
            </fieldset>
            <fieldset class="form-group">
                <label>Имейл</label>
                <input type="text" class="form-control" value="{{ Auth::user()->email }}" readonly>
            </fieldset>
            <fieldset class="form-group">
                <label>Населено място</label>
                <input type="text" class="form-control" name="settlement" value="{{ $profile->settlement }}">
            </fieldset>
            <fieldset class="form-group">
                <label>За мен</label>
                <textarea name="about_me" cols="30" rows="10" name="about_me" class="form-control">{{ $profile->about_me }}</textarea>
            </fieldset>
            <fieldset>
                <button class="btn btn-primary btn-block" type="submit">Промени</button>
            </fieldset>
        </form>
    </div>
</div>
@endsection