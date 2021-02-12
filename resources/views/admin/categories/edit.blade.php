@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Category</div>

                    <div class="card-body">
                        <form action="{{ route('admin.categories.update', $category) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Name" required minlength="2" value="{{ old('name', $category->name) }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
