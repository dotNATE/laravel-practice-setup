@extends('main')

@section('title', 'Knitter Home')

@section('content')

    <section>
        <h3 class="homeTitle">Welcome back {{ session('userName') }}</h3>

        <form class="newStitch" action="/create" method="post">
            <input class="newStitchInput" type="text" name="body" placeholder="What's up?">
            {{ csrf_field() }}
            <button class="newStitchButton" type="submit">Make a stitch</button>
        </form>

        <h4 class="recentTitle">Recent Messages:</h4>
        <ul class="stitchWindow">
            @foreach($messages as $message)
                <li class="stitch">
                    <a class="stitchUsername" href="/user/{{ $message->postedById }}/">{{ $message->postedBy }}</a>
                    <a class="stitchContentText" href="/message/{{ $message->id }}">{{ $message->body }}</a>
                    <p class="stitchTimestamp">{{ $message->created_at->diffForHumans() }}</p>
                    <a class="stitchDelete" href="/message/delete/{{ $message->id }}">Delete</a>
                </li>
            @endforeach
        </ul>
    </section>

@endsection
