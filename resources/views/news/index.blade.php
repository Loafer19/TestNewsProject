@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <form action="">
                            <select name="categories[]" class="form-control mb-3" multiple>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ in_array($category->id, request()->categories ?? []) ? 'selected' : null }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <div class="row">
                    @foreach ($news as $row)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <img class="card-img-top" src="{{ $row->image }}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $row->name }}</h5>
                                    <p class="card-text">{{ $row->short_text }}</p>
                                    <a href="{{ route('news.show', $row) }}" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                {{ $news->withQueryString()->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
