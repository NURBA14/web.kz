@extends('admin.layouts.layout')

@section('title')
    Admin Courses
@endsection

@section('header')
    Courses list
@endsection

@section('content')
    <div class="container">
        @include("admin.layouts.success")
        @include("admin.layouts.error")
        <div class="row" id="table-bordered">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Courses</h4>
                    </div>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Created At</th>
                                        <th>Subscriptions count</th>
                                        <th>Videos count</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($courses)
                                        @foreach ($courses as $course)
                                            <tr>
                                                <td>{{ $course->id }}</td>
                                                <td>
                                                    <a href="{{ route('courses.show', ['course' => $course->id]) }}">
                                                        {{ $course->name }}
                                                    </a>
                                                </td>
                                                <td>{{ $course->created_at }}</td>
                                                <td>{{ $course->subscriptions_count }}</td>
                                                <td>{{ $course->videos_count }}</td>
                                                <td>
                                                    <a href="{{ route('courses.edit', ['course' => $course->id]) }}">
                                                        <button class="btn btn-warning">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </button>
                                                    </a>
                                                    <form action="{{ route('courses.destroy', ['course' => $course->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button onclick="return confirm('Delete this Course')"
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
