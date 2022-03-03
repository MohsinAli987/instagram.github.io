@extends('layouts.app')

@section('content')


<div class="container ">
    <div class="row d-flex justify-content-lg-centers">
        <div class="col-5 d-flex align-items-center">

            <div class="ProfielPicForPost ">
                <a href="/profile/{{$authuser->id}}">profile</a>
            </div>
            <div class=" ps-1">
                <a href="/profile/{{$authuser->id}}">
                    <img src="{{$authuser->profile->ProfileImage()}}" class="w-100 rounded-circle" style="height: 80px;">
                </a>
            </div>
            <div class="searchpost ps-lg-5">
                <input type="text" class=" form-control-lg">
            </div>
        </div>

    </div>


@foreach($posts as $post)
<div class="row ">
    <div class="col-4 offset-4 pt-3">
        <h4>Post of <a href="/profile/{{$post->user->id}}"><span class="fw-bold">{{$post->user->username}} </span></a></h4>
        <p>{{$post->caption}}</p>

    </div>

    <div class="col-4 offset-4">
        <a href="/profile/{{$post->user->id}}">
            <img src="/storage/{{$post->image}}" alt="Post" class="w-100">
        </a>
    </div>
</div>
@endforeach
<div class="row">
    <div class=" d-flex justify-content-center pt-3">
        {{$posts->links('pagination::bootstrap-4')}}
    </div>
</div>

</div>


@endsection
