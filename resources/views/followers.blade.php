@extends('main')

@section('title', 'Knitter - Followers')

@section('content')

    <section>

        <h2>{{ $user->name }}'s followers</h2>

        @foreach ($followers as $follower)
            <a href="/user/{{ $follower->id }}"><p>{{ $follower->name }}</p></a>
            <p>Started following {{ $follower->created_at->diffForHumans() }}</p>
            <br>
        @endforeach

    </section>

@endsection
