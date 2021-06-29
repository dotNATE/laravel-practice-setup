@extends('main')

@section('title', 'Knitter - Following')

@section('content')

    <section>

        <h2>You are following, the following:</h2>

        @foreach ($following as $user)
            <a href="/user/{{ $user->followUserId }}"><p>{{ $user->name }}</p></a>
            <p>Started following {{ $user->created_at->diffForHumans() }}</p>
            <br>
        @endforeach

    </section>

@endsection
