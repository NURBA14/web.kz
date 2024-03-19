@extends('guest.layouts.layout')


@section('title')
    Subscriptions
@endsection

@section('header')
    Subscriptions Price
@endsection

@section('content')
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="pricing">
                <div class="row align-items-center">
                    <div class="d-flex justify-content-center">
                        @if ($subs)
                            @foreach ($subs as $sub)
                                <div class="col-md-3 px-0 position-relative z-1">
                                    <div class="card me-5 card-highlighted shadow-lg">
                                        <div class="card-header text-center">
                                            <h4 class="card-title">{{ $sub->name }}</h4>
                                            <p></p>
                                        </div>
                                        <h1 class="price text-white">${{ $sub->price }}</h1>
                                        <ul>
                                            @if ($sub->courses->count())
                                                @foreach ($sub->courses as $course)
                                                    <li><i class="bi bi-check-circle"></i>{{ $course->name }}</li>
                                                @endforeach
                                            @endif
                                        </ul>
                                        <div class="card-footer">
                                            <a href=""><button class="btn btn-outline-white btn-block">Order
                                                    Now</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
