@extends('admin.layouts.layout')

@section('title')
    Admin Video
@endsection

@section('header')
    Video
@endsection

@section('content')
    @include('admin.layouts.success')
    @include('admin.layouts.error')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card text-start">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">{{ $video->name }}</h4>
                            <p>
                                <i class="bi bi-eye-fill"></i> {{ $video->views }}
                            </p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="card-text">{{ $video->description }}</p>
                            <p class="card-text">{{ $video->course->name }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="d-flex justify-content-center">
                <div class="col-md-8">
                    <div id="player"></div>
                </div>
            </div>
        </div>

    </div>

    <script>
        var player = new Playerjs({
            id: "player",
            file: "{{ asset($video->getVideo()) }}"
        });
    </script>
@endsection
