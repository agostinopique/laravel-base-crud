@extends('layout.layout')

@section('content')

    <h1>OOPS...</h1>

    <p>Looks like you searched for a comic that doesnt exist........yet!(wink wink) </p>

    <p>You could go back and check our other comics! I'm pretty sure you'll find something for you!</p>

    <a class="btn btn-primary" href="{{ route('comic.index') }}" role="button">Maybe you're right!</a>

@endsection
