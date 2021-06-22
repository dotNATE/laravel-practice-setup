@extends('main')

@section('title', $message->title)

@section('content')
    
<h3>{{ $message->title }}</h3>
<p>{{ $message->content }}</p>
<p>{{ $message->created_at->diffForHumans() }}</p>

@endsection
