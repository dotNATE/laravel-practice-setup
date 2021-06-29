@extends('main')

@section('title', 'Followers')

@section('content')

    <section>

        @if(Route::is('followers'))
            <h2>{{ $user->name }}'s followers</h2>
        @elseif(Route::is('following'))
            <h2>You are following, the following:</h2>
        @endif

        @foreach ($followers as $follower)
            <a href="/user/{{ $follower->id }}"><p>{{ $follower->name }}</p></a>
            <p>Started following {{ $follower->created_at->diffForHumans() }}</p>
            <br>
        @endforeach

    </section>

@endsection
