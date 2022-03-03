@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 ">

            <div class="card">
                <div class="card-header">
                    <h1 class="text-center">Edit Profile</h1>
                    <a href="/profile/{{$user->id}}" class="btn btn-danger float-end">Back</a>
                </div>
                <div class="card-body">
                    <form enctype="multipart/form-data" action="/profile/{{$user->id}}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <label class="form-label">Enter Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value=" {{old('caption') ?? $user->profile->title}}" autocomplete="title">

                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Enter description</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{$user->profile->description}}" autocomplete="description">

                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Enter url</label>
                            <input type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ $user->profile->url ?? 'N/A' }}" autocomplete="url">

                            @error('url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3 d-flex flex-column">
                            <label class="form-label">Update Profile Pic</label>
                            <input type="file" class=" form-control-file @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="image">

                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection