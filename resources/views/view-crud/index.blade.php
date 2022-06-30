@extends('layout.layout')

@section('content')
    <h1>Our Comics</h1>

    <div class="container">
        <div class="row row-cols-4">
            @foreach ($comics as $comic)
            <div class="col my-4 comic-card">
                <div class="text-center d-flex flex-column h-100 justify-content-between">
                    <a href="{{ route('comic.show', $comic->id) }}">
                        <img class="w-75" src="{{$comic->image}}" alt="{{$comic->title}}">
                    </a>
                    <h4>{{$comic->title}}</h4>
                    <span class="d-block mb-5">{{$comic->type}}</span>
                    <div>
                        <a class="btn btn-primary" href="{{ route('comic.edit', $comic) }}" role="button">EDIT</a>
                        <form class="d-inline" action="{{ route('comic.destroy', $comic) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">DELETE</button>
                        </form>
                    </div>

                </div>
            </div>
            @endforeach

    </div>

@endsection
