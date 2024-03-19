@extends('admin.layouts.layout')

@section('title')
    Admin Videos
@endsection

@section('header')
    Videos list
@endsection

@section('content')
    <div class="container">
        <div class="row" id="table-bordered">
            <div class="col-12">
                @include('admin.layouts.success')
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Videos</h4>
                    </div>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Course</th>
                                        <th>Views</th>
                                        <th>Path</th>
                                        <th>Created At</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($videos)
                                        @foreach ($videos as $video)
                                            <tr>
                                                <td>{{ $video->id }}</td>
                                                <td>
                                                    <a href="{{ route('videos.show', ['video' => $video->id]) }}">
                                                        {{ $video->name }}
                                                    </a>
                                                </td>
                                                <td>{{ $video->course->name }}</td>
                                                <td>{{ $video->views }}</td>
                                                <td>
                                                    <a target="blank" href="{{ asset($video->getVideo()) }}">
                                                        Video
                                                    </a>
                                                </td>
                                                <td>{{ $video->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('videos.edit', ['video' => $video->id]) }}">
                                                        <button class="btn btn-warning">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </button>
                                                    </a>
                                                    <form action="{{ route('videos.destroy', ['video' => $video->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button onclick="return confirm('Delete this video')"
                                                            class="btn btn-danger" type="submit">
                                                            <i class="bi bi-trash-fill"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
