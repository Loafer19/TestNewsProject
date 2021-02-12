@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Categories <a href="{{ route('admin.categories.create') }}" class="float-right">Create</a></div>

                    <div class="card-body">
                        <ul class="mb-0">
                            @foreach ($categories as $category)
                                <li>
                                    <a href="{{ route('admin.categories.show', $category) }}">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
