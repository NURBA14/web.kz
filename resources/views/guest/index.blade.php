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
            <div class="banner-content">
                <div class="flex flex-direction-column flex-gap-32">
                    <br><br>
                    <h1 class="uppercase">БЕСПЛАТНОЕ ОБУЧЕНИЕ ПРОГРАММИРОВАНИЮ, СОЗДАНИЮ ВЕБ САЙТОВ в режиме ОНЛАЙН
                        24/7</h1>
                    <div>Интерактивные курсы и уроки по разработке и веб программированию. Научим
                        создавать профессиональные сайты с нуля. Начни обучение сейчас!</div>
                    <br>
                    <a href="{{ route('guest.subscriptions.index') }}" class="btn btn-info fit-content text-dark">Все
                        подписки</a>
                </div>
            </div>
        </div>

        <br><br><br>

        <div class="row">

            @if ($subs)
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h1 class="card-title">
                                <i class="bi bi-person-square"></i>
                            </h1>
                            <p class="card-text">{{ $subs }} Professions</p>
                        </div>
                    </div>
                </div>
            @endif

            @if ($courses)
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h1 class="card-title">
                                <i class="bi bi-file-code-fill"></i>
                            </h1>
                            <p class="card-text">{{ $courses }} Courses</p>
                        </div>
                    </div>
                </div>
            @endif

            @if ($videos)
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h1 class="card-title">
                                <i class="bi bi-play-btn-fill"></i>
                            </h1>
                            <p class="card-text">{{ $videos }} Videos</p>
                        </div>
                    </div>
                </div>
            @endif

        </div>

        <div class="row">
            <section class="content">
                <div class="">
                    <h2 class="h2"> На наших курсах вы </h2><br>
                    <ul class="d-flex justify-content-between">
                        <div class="text-center">
                            <i class="bi bi-check-circle-fill"></i>
                            <p class="">Поймёте, что вам по&nbsp;силам научиться программировать</p>
                        </div>
                        <div class="text-center">
                            <i class="bi bi-check-circle-fill"></i>
                            <p class=""> Получите пошаговый план развития в&nbsp;новой сфере </p>
                        </div>
                        <div class="text-center">
                            <i class="bi bi-check-circle-fill"></i>
                            <p class=""> Разберётесь в&nbsp;разнообразии IT-направлений на&nbsp;практике и&nbsp;кейсах
                            </p>
                        </div>
                        <div class="text-center">
                            <i class="bi bi-check-circle-fill"></i>
                            <p class=""> На&nbsp;практике освоите одну из&nbsp;2&nbsp;IT-профессий </p>
                        </div>
                        <div class="text-center">
                            <i class="bi bi-check-circle-fill"></i>
                            <p class=""> Поймёте, какая IT-профессия вам действительно подходит </p>
                        </div>
                    </ul>
                </div>
            </section>
        </div>
    </div>
@endsection
