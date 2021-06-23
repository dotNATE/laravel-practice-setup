@extends('main')

@section('title', $message->title)

@section('content')

<p>{{ $message->body }}</p>
<p><strong>{{ $message->created_at->diffForHumans() }}</strong> posted by: <strong><a href="/user/{{ $message->postedBy }}/">{{ $message->postedBy }}</a></strong></p>

@endsection
