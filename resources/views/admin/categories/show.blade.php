@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Category <a href="{{ route('admin.categories.edit', $category) }}" class="float-right">Edit</a></div>

                    <div class="card-body">
                        <h2>{{ $category->name }}</h2>

                        <form action="{{ route('admin.categories.destroy', $category) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
