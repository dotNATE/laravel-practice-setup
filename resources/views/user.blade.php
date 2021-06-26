@extends('main')

@section(['title', $user->name])

@section('content')

    <h3>{{ $user->name }} has <a href="/user/{{ $user->id }}/followers">{{ count($followers) }} followers!</a></h3>

    @if(array_key_exists(session('userId'), $followers))
        <a href="/user/unfollow/{{ $user->id }}"><button>Unfollow</button></a>
    @else
        <a href="/user/follow/{{ $user->id }}"><button>Follow</button></a>
    @endif

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
