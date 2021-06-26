@extends('main')

@section('title', 'Homepage')

@section('content')

    <h4>Post a message:</h4>

    <form action="/create" method="post">
        <input type="text" name="body" placeholder="Body">
        {{ csrf_field() }}
        <button type="submit">Submit</button>
    </form>
    <br>

    <h4>Recent Messages:</h4>

    <ul>

        @foreach($messages as $message)
            <li>
                {{ $message->body }}
                <br><br>
                {{ $message->created_at->diffForHumans() }}
                 --
                posted by: <strong><a href="/user/{{ $message->postedById }}/">{{ $message->postedBy }}</a></strong>
                <br>
                <a href="/message/{{ $message->id }}">View</a>
                <a href="/message/delete/{{ $message->id }}" method="delete">Delete</a>
            </li>
            <br>
        @endforeach

    </ul>

@endsection
