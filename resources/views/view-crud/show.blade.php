@extends('layout.layout')

@section('content')
    <h1>Fumetto</h1>
    <div class=" container d-flex flex-column align-items-center">
        <img class="w-25" src="{{$comic->image}}" alt="{{$comic->title}}">
        <h2 class="mt-4">{{$comic->title}}</h2>
        <h5 class="mt-1">{{$comic->type}}</h5>
    </div>
@endsection
