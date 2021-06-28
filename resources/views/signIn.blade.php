@extends('main')

@section('title', 'Knitter - Sign In')

@section('content')

    <div class="signInForm">
        <h3 class="signInTitle">Sign in</h3>
        <form class="registerForm" action="/user/login/" method="post">
            <input class="signInInput" type="text" name="name" placeholder="Enter Username">
            <input class="signInInput" type="password" name="password" placeholder="Enter Password">
            {{ csrf_field() }}
            <button class="signInButton" type="submit">Submit</button>
        </form>
        <a href="/register/">or sign up to start knitting today!</a>
    </div>

@endsection
