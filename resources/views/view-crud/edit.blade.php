@extends('layout.layout')

@section('content')

    <h1>Edit Comic Record</h1>
    <div class="container">

        @if($errors->all())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif

        <form action="{{ route('comic.update', $comic) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="comicTitle" class="form-label">Comic title</label>
                <input type="text" class="form-control" id="comicTitle" name="title" value="{{old('title', $comic->title)}}">
                @error('title')
                    <p class="alert alert-danger mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="comicType" class="form-label">Type</label>
                <input type="text" class="form-control" id="comicType" name="type" value="{{old('type', $comic->type)}}">
                @error('type')
                    <p class="alert alert-danger mt-1">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="comicImage" class="form-label">Comic Cover Image</label>
                <input type="text" class="form-control" id="comicImage" name="image" value="{{ old('image', $comic->image)}}">
                @error('image')
                    <p class="alert alert-danger mt-1">{{$message}}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


@endsection
