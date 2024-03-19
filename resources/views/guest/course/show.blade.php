@extends('guest.layouts.layout')


@section('title')
    Course
@endsection

@section('header')
    <div class="d-flex justify-content-between">
        <p>
            {{ $course->name }}
        </p>
    </div>
@endsection

@section('content')
    @include('guest.layouts.success')
    <div class="card">
        @if ($course->videos->count())
            <div class="card-body mt-1">
                <div class="comment">
                    <div class="comment-header">
                        <h5>
                            Video list:
                        </h5>
                    </div>
                    <div class="comment-body">
                        @foreach ($course->videos as $video)
                            <ul>
                                <li>
                                    <p><a
                                            href="{{ route('guest.video.show', ['id' => $video->id]) }}">{{ $video->name }}</a>
                                    </p>
                                </li>
                            </ul>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
