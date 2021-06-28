@extends('main')

@section('title', 'Knitter - Sign In')

@section('content')

    <div>
        <h3 class="registerTitle">...or sign <em>up</em></h3>
        <form class="registerForm" action="/user/create/" method="post">
            <input class="registerInput" type="text" name="name" placeholder="Enter Username">
            <input class="registerInput" type="email" name="email" placeholder="Enter Email">
            <input class="registerInput" type="password" name="password" placeholder="Enter Password">
            <input class="registerInput" type="password" name="passwordConf" placeholder="Confirm Password">
            {{ csrf_field() }}
            <button class="registerButton" type="submit">Submit</button>
        </form>
    </div>

@endsection
