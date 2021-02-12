@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">News <a href="{{ route('admin.news.create') }}" class="float-right">Create</a></div>

                    <div class="card-body">
                        <ul class="mb-0">
                            @foreach ($news as $row)
                                <li>
                                    <a href="{{ route('admin.news.show', $row) }}">{{ $row->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
