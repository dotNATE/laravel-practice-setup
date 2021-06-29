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

                @include('message')

            @endforeach
        </ul>
    </section>

@endsection
