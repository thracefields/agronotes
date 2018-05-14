@extends('layouts.app')

@section('content')
@if(Session::has('success'))
    <p class="m-1 alert alert-success"><i class="fas fa-check"></i> {{ Session::get('success') }}</p>
@endif
<a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary mt-2"><i class="fas fa-pencil-alt"></i> Редактирай</a>
    <div class="row">
        <div class="col-md-10">
            <h3>{{ $task->title }}</h3>
            <p>{{ $task->description }}</p>
        </div>
    </div>
@endsection