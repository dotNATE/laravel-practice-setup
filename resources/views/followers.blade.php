@extends('main')

@section('title', 'Followers')

@section('content')

    <h2>{{ $user->name }}'s followers</h2>

{{--    <pre>--}}
{{--        {{ print_r($followers) }}--}}
{{--    </pre>--}}

    @foreach ($followers as $follower)

        <a href="/user/{{ $follower->id }}"><p>{{ $follower->name }}</p></a>
        <p>Started following {{ $follower->created_at->diffForHumans() }}</p>
        <br>

    @endforeach

@endsection
