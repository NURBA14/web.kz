@extends('admin.layouts.layout')

@section('title')
    Admin Course
@endsection

@section('header')
    Course
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ $course->name }}</h4>
                    </div>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <tbody>
                                    <tr>
                                        <td>Name</td>
                                        <td>{{ $course->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Description</td>
                                        <td>{{ $course->description }}</td>
                                    </tr>
                                    <tr>
                                        <td>Created At</td>
                                        <td>{{ $course->created_at }}</td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseOne" aria-expanded="false"
                                            aria-controls="flush-collapseOne">
                                            Subscriptions
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample"
                                        style="">
                                        <div class="accordion-body">

                                            <table class="table table-bordered mb-0">
                                                <tbody>
                                                    @if ($course->subscriptions->count())
                                                        @foreach ($course->subscriptions as $sub)
                                                            <tr>
                                                                <td>
                                                                    <a href="#">
                                                                        {{ $sub->name }}
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        This Course dont have subsciprions
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
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
                                        <th>Path</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($course->videos)
                                        @foreach ($course->videos as $video)
                                            <tr>
                                                <td>{{ $video->id }}</td>
                                                <td>
                                                    <a
                                                        href="{{ route('videos.show', ['video' => $video->id]) }}">{{ $video->name }}</a>
                                                </td>
                                                <td>
                                                    <a target="blank" href="{{ asset($video->getVideo()) }}">
                                                        Video link
                                                    </a>
                                                </td>
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
