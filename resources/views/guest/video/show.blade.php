@extends('guest.layouts.layout')


@section('title')
    Home
@endsection

@section('header')
@endsection

@section('content')
    @include('guest.layouts.success')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card text-start">
                    <div class="card-header">
                        <h4 class="card-title">{{ $video->name }}</h4>
                        <div class="d-flex justify-content-between">
                            <p class="card-text">{{ $video->description }}</p>
                            <h5>{{ $video->views }} <i class="bi bi-eye-fill"></i></h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="d-flex justify-content-center">
                                <div class="col-md-12">
                                    <div id="player"></div>
                                </div>
                            </div>
                        </div>
                    </div>
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
