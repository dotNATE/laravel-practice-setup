@extends('main')

@section(['title', $user->name])

@section('content')

    <h3>@if(session('userId') === $user->id)You have @else{{ $user->name }} has @endif<a href="/user/{{ $user->id }}/followers">{{ count($followers) }} followers!</a></h3>

    @if(session('userId') !== $user->id)
    @if(array_key_exists(session('userId'), $followers))
        <a href="/user/unfollow/{{ $user->id }}"><button>Unfollow</button></a>
    @else
        <a href="/user/follow/{{ $user->id }}"><button>Follow</button></a>
    @endif
    @endif

    <h3>@if(session('userId') === $user->id)Your messages: @else Messages posted by {{ $user->name }}: @endif</h3>

    <ul>

        @foreach($messages as $message)

            <li>
                <p>{{ $message->body }}</p>
                <p><strong>{{ $message->created_at->diffForHumans() }}</strong> posted by: <strong>{{ $message->postedBy }}</strong></p>
            </li>

        @endforeach

    </ul>

@endsection
