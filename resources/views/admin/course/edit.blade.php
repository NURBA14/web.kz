@extends('admin.layouts.layout')

@section('title')
    Admin Courses
@endsection

@section('header')
    Edit <b class="text-info">{{ $course->name }}</b> Course
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" action="{{ route('courses.update', ['course' => $course->id]) }}"
                                method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Name</label>
                                                <input type="text" id="first-name-vertical"
                                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                                    placeholder="Name" value="{{ $course->name }}">
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                            <textarea class="form-control @error('description') is-invalid @enderror" id="exampleFormControlTextarea1"
                                                rows="3" name="description" placeholder="Description">{{ $course->description }}</textarea>
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
