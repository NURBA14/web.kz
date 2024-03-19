@extends('guest.layouts.layout')


@section('title')
    Subsciptions
@endsection

@section('header')
    <div class="d-flex justify-content-between">
        <p>
            Subsciption: {{ $sub->name }}
        </p>

        <p>
            {{ $sub->price }}$
        </p>
    </div>
@endsection

@section('content')
    @include('guest.layouts.success')
    <h4>Courses:</h4>
    @if ($sub->courses->count())
        @foreach ($sub->courses as $course)
            <div class="card">
                <div class="card-body mt-3">
                    <div class="comment">
                        <div class="comment-header">
                            <div class="comment-body">
                                <div class="h4 comment-profileName">
                                    <a href="{{ route('guest.course.show', ['id' => $course->id]) }}">
                                        {{ $course->name }}
                                    </a>
                                </div>
                                <div class="comment-message d-flex justify-content-between">
                                    <p class="list-group-item-text truncate mb-20">{{ $course->description }}</p>
                                    <h4>{{ $course->videos->count() }} <i class="bi bi-play-btn-fill"></i></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
@endsection
