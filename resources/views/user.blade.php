@extends('main')

@section(['title', $user->name])

@section('content')

    <h3>Messages posted by {{ $user->name }}</h3>

    <ul>

        @foreach($messages as $message)

            <li>
                <p>{{ $message->body }}</p>
                <p><strong>{{ $message->created_at->diffForHumans() }}</strong> posted by: <strong>{{ $message->postedBy }}</strong></p>
            </li>

        @endforeach

    </ul>

@endsection
