@extends('layouts.app')

@section('content')
    @if(Session::has('success'))
        <p class="m-1 alert alert-success"><i class="fas fa-check"></i> {{ Session::get('success') }}</p>
    @endif

<div class="row">
    <div class="col-md-10 mx-auto rounded">
    <h2 class="app-heading">Профил</h2>
        @if(Auth::user()->id === $profile->user->id)
            <a href="{{ route('profile.index') }}" class="btn float-xl-right btn-primary mt-2"><i class="fas fa-pencil-alt"></i> Редактирай</a>
        @endif
        <a href="{{ url('/users') }}" class="mr-1 btn float-xl-right btn-primary mt-2">Всички потребители</a>
        <div class="row">
            <div class="col-md">
            {!! Avatar::create($user->name)->toSvg() !!}            
            </div>
            <div class="col-md-6 align-self-center">
                    <h4 class="font-weight-bold">{{ $user->name }}</h4>
                    <p>Регистриран на: {{ $user->created_at->format('j.m.Y') }}</p>
            </div>
        </div>
                @isset($profile->settlement)
                <h5>Населено място</h5>
                <p class="alert alert-primary"><i class="fas fa-thumbtack"></i> {{ $profile->settlement }}</p>
                
                @endisset
                @isset($profile->about_me)
                <h5>За мен</h5>
                <p class="alert alert-primary"><i class="far fa-address-card"></i> {{ $profile->about_me }}</p>
                @endisset

                @empty($profile->name || $profile->settlement)
                <p class="mt-2 alert alert-info">Профилът все още не е попълнен!</p>
                @endempty
	</div>

</div>
@endsection