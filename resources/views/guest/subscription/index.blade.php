@extends('guest.layouts.layout')


@section('title')
    Subsciptions
@endsection

@section('header')
    <h4>Subscriptions:</h4>
@endsection

@section('content')
    @include('guest.layouts.success')
    @if ($subs)
        @foreach ($subs as $sub)
            <div class="card">
                <div class="card-body mt-3">
                    <div class="comment">
                        <div class="comment-header">
                            <div class="comment-body">
                                <div class="h4 comment-profileName">
                                    <a href="{{ route('guest.subscriptions.show', ['id' => $sub->id]) }}">
                                        {{ $sub->name }}
                                    </a>
                                </div>
                                <div class="comment-message">
                                    <p class="list-group-item-text truncate mb-20">{{ $sub->description }}</p>
                                    @if ($sub->courses->count())
                                        <ul>
                                            @foreach ($sub->courses as $course)
                                                <li><a
                                                        href="{{ route('guest.course.show', ['id' => $course->id]) }}">{{ $course->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
@endsection
