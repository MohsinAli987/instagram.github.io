@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 ">

            <div class="card">
                <div class="card-header">
                    <h1 class="text-center">Create Post</h1>
                    <a href="/profile" class="btn btn-danger float-end">Back</a>
                </div>
                <div class="card-body">
                    <form enctype="multipart/form-data" action="{{url('/p')}}" method="POST">
                        @csrf
                        @method('GET')

                        <div class="mb-3">
                            <label class="form-label">Enter Caption</label>
                            <input type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}" autocomplete="caption">

                            @error('caption')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3 d-flex flex-column">
                            <label class="form-label">Add Image</label>
                            <input type="file" class=" form-control-file @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" autocomplete="image" >

                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Submit Button</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
