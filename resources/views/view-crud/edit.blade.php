@extends('layout.layout')

@section('content')

    <h1>Edit Comic Record</h1>
    <div class="container">
        <form action="{{ route('comic.update', $comic) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="comicTitle" class="form-label">Comic title</label>
                <input type="text" class="form-control" id="comicTitle" name="title" value="{{ $comic->title }}">
            </div>
            <div class="mb-3">
                <label for="comicType" class="form-label">Type</label>
                <input type="text" class="form-control" id="comicType" name="type" value="{{ $comic->type }}">
            </div>
            <div class="mb-3">
                <label for="comicImage" class="form-label">Comic Cover Image</label>
                <input type="text" class="form-control" id="comicImage" name="image" value="{{ $comic->image }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>


@endsection
