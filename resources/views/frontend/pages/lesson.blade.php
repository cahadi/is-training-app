@extends('frontend.layouts.layout')

@section('content')

    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $answer->lesson->title }}</h4>
                        <x-markdown>
                            {{ $answer->body }}
                        </x-markdown>
                    </div>

                </div>
            </div>
        </div>
        <div class="row justify-content-between">
            @if($previous != null)
            <div class="col-lg-2 grid-margin stretch-card ">
                <div class="card">
                    <div class="card-body">
                        <div class="template-demo">
                            <button type="button" class="btn btn-inverse-dark btn-fw">
                                <a style="color: #ffffff" class="nav-link" href="{{ $previous->lesson->title }}">
                                    <- Предыдущее
                                </a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @if($prac != true)
            <div class="col-lg-2 grid-margin stretch-card ">
                <div class="card">
                    <div class="card-body">
                        <div class="template-demo">
                            <button type="button" class="btn btn-inverse-dark btn-fw">
                                <a style="color: #ffffff" href="/answers/form/{{ $answer->lesson->title }}">
                                    Дать ответ
                                </a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="col-lg-2 grid-margin stretch-card ">
                <div class="card">
                    <div class="card-body">
                        <div class="template-demo">
                            <button type="button" class="btn btn-inverse-dark btn-fw">
                                <a style="color: #ffffff" href="{{ $next->lesson->title }}">
                                    Следующее ->
                                </a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
