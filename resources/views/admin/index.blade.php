@extends('admin.layouts.layout')

@section('title')
@endsection

@section('header')
@endsection

@section('content')
    @include('admin.layouts.success')
    @include('admin.layouts.error')
    <div class="container">
        <div class="row">
            @if ($subs)
                <div class="col-md-3">
                    <div class="card text-start">
                        <div class="card-header text-center">
                            <h1><i class="bi bi-backpack3-fill"></i></h1>
                        </div>
                        <div class="card-body text-center">
                            <h4 class="card-title">Subscriptions</h4>
                            <p class="card-text">{{ $subs }}</p>
                        </div>
                    </div>
                </div>
            @endif

            @if ($courses)
                <div class="col-md-3">
                    <div class="card text-start">
                        <div class="card-header text-center">
                            <h1><i class="bi bi-journal-code"></i></h1>
                        </div>
                        <div class="card-body text-center">
                            <h4 class="card-title">Courses</h4>
                            <p class="card-text">{{ $courses }}</p>
                        </div>
                    </div>
                </div>
            @endif

            @if ($videos)
                <div class="col-md-3">
                    <div class="card text-start">
                        <div class="card-header text-center">
                            <h1><i class="bi bi-play-btn-fill"></i></h1>
                        </div>
                        <div class="card-body text-center">
                            <h4 class="card-title">Videos</h4>
                            <p class="card-text">{{ $videos }}</p>
                        </div>
                    </div>
                </div>
            @endif

            @if ($views)
                <div class="col-md-3">
                    <div class="card text-start">
                        <div class="card-header text-center">
                            <h1><i class="bi bi-eye-fill"></i></h1>
                        </div>
                        <div class="card-body text-center">
                            <h4 class="card-title">Views</h4>
                            <p class="card-text">{{ $views }}</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection


@section('footer')
@endsection
