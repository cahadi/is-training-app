@extends('frontend.layouts.layout')

@section('content')

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Ответ на задание</h4>
                <form class="forms-sample">
                    <div class="form-group">
                        <label for="exampleInputName1">Урок:</label>
                        <label for="exampleInputName1">{{ $lesson->title }}</label>
                    </div>
                    <div class="form-group">
                        <label for="body">Ответ:</label>
                        <textarea class="form-control" id="body" name="body" rows="50" placeholder="Ответ"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
