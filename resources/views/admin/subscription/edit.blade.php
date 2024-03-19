@extends('admin.layouts.layout')

@section('title')
    Admin Subscription
@endsection

@section('header')
    Edit <b class="text-info">{{ $sub->name }}</b> Subscription
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical"
                                action="{{ route('subscriptions.update', ['subscription' => $sub->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Name</label>
                                                <input type="text" id="first-name-vertical"
                                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                                    placeholder="Name" value="{{ $sub->name }}">
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                            <textarea class="form-control @error('description') is-invalid @enderror" id="exampleFormControlTextarea1"
                                                rows="3" name="description" placeholder="Description">{{ $sub->description }}</textarea>
                                        </div>
                                        <div class="col-12">
                                            <label for="contact-info-vertical">Price</label>
                                            <div class="input-group">
                                                <input type="number"
                                                    class="form-control @error('price') is-invalid @enderror"
                                                    aria-label="Dollar amount (with dot and two decimal places)"
                                                    name="price" placeholder="Price" value="{{ $sub->price }}">
                                                <span class="input-group-text">$</span>
                                                <span class="input-group-text">0.00</span>
                                            </div>
                                        </div>
                                        <br><br><br><br>

                                        <div class="col-md-12 mb-4">
                                            <label>Select Courses</label>
                                            <div class="form-group">
                                                <select class="choices form-select multiple-remove" multiple="multiple"
                                                    name="courses_id[]">
                                                    @if ($courses)
                                                        @foreach ($courses as $k => $v)
                                                            <option value="{{ $k }}"
                                                                @if (in_array($k, $sub->courses->pluck('id')->all())) selected @endif>
                                                                {{ $v }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <br><br><br>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <div class="checkbox">
                                                    <input type="checkbox" id="checkbox3" class="form-check-input"
                                                        @if ($sub->active) checked @endif name="active"
                                                        value="1">
                                                    <label for="checkbox3">Active</label>
                                                </div>
                                            </div>
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
