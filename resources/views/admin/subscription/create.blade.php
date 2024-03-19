@extends('admin.layouts.layout')

@section('title')
    Create Subscription
@endsection

@section('header')
    Create Subscription
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-vertical" action="{{ route('subscriptions.store') }}" method="POST">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="first-name-vertical">Name</label>
                                                <input type="text" id="first-name-vertical"
                                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                                    placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                            <textarea class="form-control @error('description') is-invalid @enderror" id="exampleFormControlTextarea1"
                                                rows="3" name="description" placeholder="Description"></textarea>
                                        </div>
                                        <div class="col-12">
                                            <label for="contact-info-vertical">Price</label>
                                            <div class="input-group">
                                                <input type="number"
                                                    class="form-control @error('price') is-invalid @enderror"
                                                    aria-label="Dollar amount (with dot and two decimal places)"
                                                    name="price" placeholder="Price">
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
                                                            <option value="{{ $k }}">{{ $v }}
                                                            </option>
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
                                                        checked="" name="active" value="1">
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
