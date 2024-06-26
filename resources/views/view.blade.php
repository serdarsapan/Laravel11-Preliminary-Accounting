
@extends('layout.main')

@section('content')

    <div class="container d-flex mt-5">
        <div class="card w-100">
            <div class="card-header" style="font-weight: bold">
                <h5 class="card-title font-weight-bold">{{$blog->title}}</h5>
            </div>
            <div class="card-body">
                <p class="card-text">{{$blog->content}}</p>
            </div>
        </div>
    </div>
@endsection
