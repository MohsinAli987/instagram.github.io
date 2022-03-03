@extends('layouts.app')

@section('content')

            <div class="container">
                <div class="row ">
                    <div class="col-3 p-5">
                        <img src="{{$user->profile->ProfileImage()}}" alt="instalogo" class="rounded-circle w-100">
                    </div>
                    <div class="col-9 pt-5">
                        <div class="d-flex justify-content-between align-items-baseline">


                            <div class="d-flex">

                                <h1>{{ $user->username }}</h1>
                                <follow-button userid="{{$user->id}}" follows="{{$follows}}"></follow-button>
                            </div>
                            @can('update',$user->profile)
                            <a href="/p/create">Add Post</a>
                            @endcan

                        </div>

                        <div class="d-flex">
                            <div class="pe-2"><strong>{{$CountPosts}} </strong>Posts</div>
                            <div class="pe-2"><strong>{{$CountFollwers}} </strong>followes</div>
                            <div class="pe-2"><strong>{{$CountFollowing}}</strong>following</div>
                        </div>
                        @can('update',$user->profile)
                        <a href="/profie/{{$user->id}}/edit">Edit</a>
                        @endcan

                        <div class="pt-2 fw-bold">{{ $user->profile->title }}</div>
                        <div>{{ $user->profile->description }}
                        </div>
                        <div><a href="{{$user->profile->url}}">{{ $user->profile->url}}</a></div>
                    </div>
                </div>


                <div class="row pt-5">

                    @foreach($user->posts as $post)
                    <div class="col-4 p-3">
                        <a href="/p/{{$post->id}}">
                            <img src="/storage/{{$post->image}}" class="w-100">
                        </a>
                    </div>
                    @endforeach


                </div>
            </div>
@endsection
