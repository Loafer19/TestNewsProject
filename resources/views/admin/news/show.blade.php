@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">News <a href="{{ route('admin.news.edit', $news) }}" class="float-right">Edit</a></div>

                    <div class="card-body">
                        <h2>{{ $news->name }}</h2>
                        <h5>
                            @foreach ($news->categories as $category)
                                <span class="badge badge-light">{{ $category->name }}</span>
                            @endforeach
                        </h5>

                        <p>{{ $news->short_text }}</p>
                        <p>{!! $news->text !!}</p>
                        <img class="img-fluid mb-3" src="{{ $news->image }}" alt="">

                        <form action="{{ route('admin.news.destroy', $news) }}" method="post">
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
