@extends('layout.layout')

@section('content')
    <h1>Comic Book</h1>
    <div class=" container d-flex flex-column align-items-center">
        <img class="w-25" src="{{$comic->image}}" alt="{{$comic->title}}">
        <h2 class="mt-4">{{$comic->title}}</h2>
        <h5 class="mt-1">{{$comic->type}}</h5>
    </div>
    <button href="{{ route('comic.index') }}" type="button" class="btn btn-primary"><< Back</button>

@endsection
