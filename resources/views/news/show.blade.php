@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mb-4">
                <div class="card">
                    <img class="card-img-top" src="{{ $news->image }}" alt="Card image cap">
                    <div class="card-body">
                        <h2 class="card-title">{{ $news->name }}</h2>
                        <h5>
                            @foreach ($news->categories as $category)
                                <span class="badge badge-light">{{ $category->name }}</span>
                            @endforeach
                        </h5>
                        <p class="card-text">{{ $news->short_text }}</p>
                        <p class="card-text">{{ $news->text }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
