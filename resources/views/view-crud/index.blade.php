@extends('layout.layout')

@section('content')
    <h1>Homepage</h1>

    <div class="container">
        <div class="row row-cols-4">
            @foreach ($comics as $comic)
            <div class="col my-4" href>
                <div class="image">
                    <a href="{{ route('comic.show', $comic) }}">
                        <img src="{{$comic->image}}" alt="{{$comic->title}}">
                    </a>
                    <h4>{{$comic->title}}</h4>
                    <span>{{$comic->type}}</span>
                </div>
            </div>
            @endforeach

    </div>

@endsection
