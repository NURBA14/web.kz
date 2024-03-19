@extends('guest.layouts.layout')


@section('title')
    Courses
@endsection

@section('header')
    All Courses:
@endsection

@section('content')
    @include('guest.layouts.success')

    <div class="container">
        <div class="row">
            @if ($courses)
                @foreach ($courses as $course)
                    <div class="card text-start">
                        <div class="card-body">
                            <h4 class="card-title"><a
                                    href="{{ route('guest.course.show', ['id' => $course->id]) }}">{{ $course->name }}</a>
                            </h4>
                            <p class="card-text">{{ $course->description }}</p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

@endsection
