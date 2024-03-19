@extends('admin.layouts.layout')

@section('title')
    Admin Subscription
@endsection

@section('header')
    Subscription
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ $sub->name }}</h4>
                    </div>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <tbody>
                                    <tr>
                                        <td>Name</td>
                                        <td>{{ $sub->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Description</td>
                                        <td>{{ $sub->description }}</td>
                                    </tr>
                                    <tr>
                                        <td>Price</td>
                                        <td>{{ $sub->price }}</td>
                                    </tr>
                                    <tr>
                                        <td>Created At</td>
                                        <td>{{ $sub->created_at }}</td>
                                    </tr>
                                </tbody>
                            </table>

                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseOne" aria-expanded="false"
                                            aria-controls="flush-collapseOne">
                                            Courses
                                        </button>
                                    </h2>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                                        aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample"
                                        style="">
                                        <div class="accordion-body">

                                            <table class="table table-bordered mb-0">
                                                <tbody>
                                                    @if ($sub->courses->count())
                                                        @foreach ($sub->courses as $course)
                                                            <tr>
                                                                <td>
                                                                    <a
                                                                        href="{{ route('courses.show', ['course' => $course->id]) }}">
                                                                        {{ $course->name }}
                                                                    </a>
                                                                </td>
                                                                <td>{{ $course->videos_count }} Videos</td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        This Subsciption dont have Courses
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
