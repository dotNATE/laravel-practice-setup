@extends('main')

@section('title', 'Followers')

@section('content')

    <h2>{{ $user->name }}'s followers</h2>

    @foreach ($followers as $follower)

        <a href="/user/{{ $follower->id }}"><p>{{ $follower->name }}</p></a>

    @endforeach

@endsection
