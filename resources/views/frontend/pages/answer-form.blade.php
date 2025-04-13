@extends('frontend.layouts.layout')

@section('content')

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Ответ на задание</h4>
                <form class="forms-sample" method="post" action="{{route('create')}}">
                    @csrf
                    <div class="form-group">
                        <label for="lesson_title">Урок:</label>
                        <label for="lesson_title">{{ $lesson->title }}</label>
                    </div>
                    <input type="hidden" name="lesson_id" value="{{ $lesson->id }}">

                    <div class="form-group">
                        <label for="body">Ответ:</label>
                        <textarea class="form-control" id="body" name="body" rows="50" placeholder="Ответ"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Отправить</button>
                </form>
            </div>
        </div>
    </div>



    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
