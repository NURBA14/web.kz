@extends('admin.layouts.layout')

@section('title')
    Admin Subscriptions
@endsection

@section('header')
    Subscriptions list
@endsection

@section('content')
    <div class="container">
        <div class="row" id="table-bordered">
            <div class="col-12">
                @include('admin.layouts.success')
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Subscriptions</h4>
                    </div>
                    <div class="card-content">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Created At</th>
                                        <th>Courses count</th>
                                        <th>Active</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($subscriptions)
                                        @foreach ($subscriptions as $sub)
                                            <tr>
                                                <td>{{ $sub->id }}</td>
                                                <td>
                                                    <a
                                                        href="{{ route('subscriptions.show', ['subscription' => $sub->id]) }}">
                                                        {{ $sub->name }}
                                                    </a>
                                                </td>
                                                <td>{{ $sub->price }}</td>
                                                <td>{{ $sub->created_at }}</td>
                                                <td>{{ $sub->courses_count }}</td>
                                                <td>
                                                    @if ($sub->active)
                                                        <a href="{{ route('admin.sub.set.active', ['id' => $sub->id]) }}">
                                                            <button class="btn btn-success">TRUE</button>
                                                        </a>
                                                    @else
                                                        <a href="{{ route('admin.sub.set.active', ['id' => $sub->id]) }}">
                                                            <button class="btn btn-danger">FALSE</button>
                                                        </a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a
                                                        href="{{ route('subscriptions.edit', ['subscription' => $sub->id]) }}">
                                                        <button class="btn btn-warning">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </button>
                                                    </a>
                                                    <form
                                                        action="{{ route('subscriptions.destroy', ['subscription' => $sub->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button onclick="return confirm('Delete this Subscription')"
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
