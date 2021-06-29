@extends('main')

@section('title', 'Knitter - Sign In')

@section('content')

    <div>
        <h3 class="registerTitle">...or sign <em>up</em></h3>

        @if(count($errors) > 0 || !empty($message))
            <h3>There are some problems with your info:</h3>
            <ul>
                @if(count($errors) > 0)
                @foreach($errors as $error)

                    <li>{{ $error }}</li>

                @endforeach
                @endif
                @if(!empty($message))

                    <li>{{ $message }}</li>

                @endif
            </ul>

        @endif

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
