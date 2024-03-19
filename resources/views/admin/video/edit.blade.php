@extends('admin.layouts.layout')

@section('title')
    Admin Video
@endsection

@section('header')
    Edit Video {{ $video->name }}
@endsection

@section('content')
    <div class="col-md-12 col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-center">
                    <div class="col-md-8">
                        <div id="player"></div>
                    </div>
                </div>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form form-vertical" action="{{ route('videos.update', ['video' => $video->id]) }}"
                        method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="first-name-vertical">Video Name</label>
                                        <input type="text" id="first-name-vertical"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            placeholder="Name" value="{{ $video->name }}">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                        <textarea class="form-control @error('description') is-invalid @enderror" id="exampleFormControlTextarea1"
                                            name="description" rows="3">{{ $video->description }}</textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="inputGroupSelect01">Course</label>
                                        <select class="form-select @error('course_id') is-invalid @enderror"
                                            id="inputGroupSelect01" name="course_id">
                                            @if ($courses->count())
                                                @foreach ($courses as $k => $v)
                                                    <option value="{{ $k }}"
                                                        @if ($video->course->id == $k) selected @endif>
                                                        {{ $v }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="formFileLg" class="form-label">Video</label>
                                    <input class="form-control form-control-lg @error('video') is-invalid @enderror"
                                        id="formFileLg" name="video" type="file">
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <script>
                        var player = new Playerjs({
                            id: "player",
                            file: "{{ asset($video->getVideo()) }}"
                        });
                    </script>

                </div>
            </div>
        </div>
    </div>
@endsection
