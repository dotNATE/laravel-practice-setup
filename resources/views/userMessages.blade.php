@extends('main')

@section('title', 'Stitches')

@section('content')

    <section>
        <pre>
            @foreach($messages as $message)

                @include('message')

            @endforeach

        </pre>
    </section>

@endsection
