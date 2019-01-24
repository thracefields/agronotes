@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-10">
        <h2 class="app-heading">Моите въпроси</h2>
        <div class="row">
            <div class="col-md-3 col-md-offset-4">
                <a href="{{ route('questions.create') }}" class="p-2 btn btn-primary btn-block"><i class="fas fa-plus"></i> Задай въпрос</a>
            </div>
        </div>
            @forelse($questions as $question)
            <div class="p-2">
                <p class="bg-success rounded text-white m-0 p-2">{{ $question->body }}</p>
                <p class="text-right m-0 mb-1"><strong>Зададен от:</strong> <a href="{{ route('profile.show',$question->user->profile->id) }}">{{ $question->user->name }}</a></p>
                @empty($question->response)
                    <p>Въпросът все още няма отговор!</p>
                @endempty
                @isset($question->response)
                    <p class="alert alert-info"><strong>Отговор: </strong>{{ $question->response }}</p>
                @endisset
            </div>
            @empty
            <div class="mt-2">
                <p class="alert alert-info">Все още не сте задавали въпроси!</p>
            </div>
            @endforelse
        {{ $questions->links() }}
    </div>
</div>
@endsection