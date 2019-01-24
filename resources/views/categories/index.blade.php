@extends('layouts.admin')

@section('content')
    @if (Session::has('success'))
        <p class="m-1 alert alert-success"><i class="fas fa-check"></i> {{ Session::get('success') }}</p>
    @endif
        <div class="row mt-2">
            <div class="col-md-7"> 
                <h2 class="app-heading">Категории</h2>
                <table class="table table-hover table-responsive-sm">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Име</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td><a class="btn btn-success mb-2" href="{{ route('categories.edit', $category->id) }}"><i class="fas fa-edit"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                    </div>
                </table>
            {{ $categories->links() }}
            </div>
            <div class="col-md">
                <form action="{{ route('categories.store') }}" method="POST" data-parsley-validate>
                    @csrf
                    <h2 class="app-heading">Нова категория</h2>
                    <fieldset class="form-group">
                        <label for="name">Име</label>
                        <input class="form-control" type="text" name="name" id="name" required>
                        @if ($errors->has('name'))
                            <p class="m-1 alert alert-danger">{{ $errors->first('name') }}</p>
                        @endif
                    </fieldset>
                    <fieldset>
                        <button class="mb-2 btn btn-primary btn-block" type="submit">Добави!</button>
                    </fieldset>
                </form>
            </div>
        </div>
@endsection