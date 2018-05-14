@extends('layouts.admin')

@section('content')
@if(Session::has('success'))
        <p class="m-1 alert alert-success"><i class="fas fa-check"></i> {{ Session::get('success') }}</p>
@endif
<div class="m-2">
<table class="table table-hover table-responsive-sm">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col"><i class="fas fa-calendar-alt"></i></th>
            <th scope="col">Съвет</th>
            <td></td>
            <td></td>
        </tr>
    </thead>
    <tbody>
        @foreach ($tips as $tip)
            <tr>
                <td scope="row">{{ $tip->id }}</td>
                <th>
                @switch($tip->month)
                    @case(1)
                        Януари
                        @break
                    @case(2)
                        Февруари
                        @break
                    @case(3)
                        Март
                        @break
                    @case(4)
                        Април
                        @break
                    @case(5)
                        Май
                        @break
                    @case(6)
                        Юни
                        @break
                    @case(7)
                        Юли
                        @break
                    @case(8)
                        Август
                        @break
                    @case(9)
                        Септември
                        @break
                    @case(10)
                        Октромври
                        @break
                    @case(11)
                        Ноември
                        @break
                    @case(12)
                        Декември
                        @break    
                    @default
                        
                @endswitch
                </th>
                <td>{{ $tip->body }}</td>
                <td><td><a class="btn btn-success mb-2" href="{{ route('tips.edit', $tip->id) }}"><i class="fas fa-edit"></i></a></td></td>
                <td>
                    <form action="{{ route('tips.destroy', $tip->id) }}" method="POST">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button class="btn btn-danger" type="submit"><i class="far fa-window-close"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $tips->links() }}
@endsection