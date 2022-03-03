@extends('layouts.app')

@section('content')

<div class="container d-flex justify-content-center">
    <div class="row justify-content-center h-auto m-auto">
        <div class="col-4">
            <img src="/storage/{{$post->image}}" alt="Post" class="w-100">

        </div>
        <div class="col-3">
            <div class="ProfielPicForPost d-flex align-items-center">
                <a href="/profile/{{$post->user->id}}">
                    <img src="{{$post->user->profile->ProfileImage()}}" class="w-100 rounded-circle" style="height: 80px;">
                </a>
                <div class="ps-2">
                    <h3>{{$post->user->username}}</h3>
                </div>
                <div>
                    <a href="#" class="ps-2">Follow</a>
                </div>
            </div>
            <hr>

            <div class=" ps-3">
                <div>
                    <p><a href="/profile/{{$post->user->id}}"><span class="fw-bold">{{$post->user->username}} </span></a>{{$post->caption}}</p>

                </div>
                <h2></h2>
            </div>
        </div>

    </div>
</div>

@endsection
