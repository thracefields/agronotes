@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-10">
        <h2 class="app-heading">Bъпроси</h2>
        @if($questions->count() > 0)
            @foreach($questions as $question)
            <div class="p-2">
                <div class="row">
                    <div class="col-md-10">
                        <p class="bg-success rounded text-white m-0 p-2">{{ $question->body }}</p>
                        <p class="text-right m-0 mb-1"><strong>Зададен от:</strong> <a href="{{ route('profile.show',$question->user->profile->id) }}">{{ $question->user->name }}</a></p>
                    </div>
                    <div class="col-md">
                        <a href="{{ route('admin.questions.edit', $question->id) }}" class="btn btn-primary">Отговори</a>
                    </div>
                </div>
            </div>
            @endforeach
        {{ $questions->links() }}
        @else
        <p class="alert alert-info">Няма зададени въпроси!</p>
        @endif
    </div>    
</div>
@endsection