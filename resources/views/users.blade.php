@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-10 mx-auto">
            <h2 class="app-heading">Потребители</h2>
            @if($users->count() > 0)
                @foreach($users as $user)
                    <div class="d-sm-flex p-2">
                        <div>
                            {!! Avatar::create($user->name)->setDimension(100)->setFontSize(50)->toSvg() !!}
                        </div>
                        <div class="p-3">
                            <h4>{{ $user->name }}</h4><a href="{{ route('profile.show', $user->id) }}">Профил</a>
                            <p>Регистриран на: {{ $user->created_at->format('j.m.Y') }}</p>
                        </div>
                    </div>
                @endforeach
                {{ $users->links() }}
            @endif
        </div>
    </div>
@endsection