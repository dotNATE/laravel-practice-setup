<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <title>@yield('title')</title>
</head>
<body>

    <nav>
        <a href="/"><h1>Knitter</h1></a>
        <a href="/user/{{ session('userId') }}">Profile</a>
        <a href="/user/logout/">Logout</a>
    </nav>

    @if(session('isLoggedIn') === true)

        @yield('content')

    @else

        <div class="signInForms">
            <div class="signInForm">
                <h3 class="signInTitle">Sign in</h3>
                <form class="registerForm" action="/user/login/" method="post">
                    <input class="signInInput" type="text" name="name" placeholder="Enter Username">
                    <input class="signInInput" type="password" name="password" placeholder="Enter Password">
                    {{ csrf_field() }}
                    <button class="signInButton" type="submit">Submit</button>
                </form>
            </div>

            <div>
                <h3 class="registerTitle">...or sign <em>up</em></h3>
                <form class="registerForm" action="/user/create/" method="post">
                    <input class="registerInput" type="text" name="name" placeholder="Enter Username">
                    <input class="registerInput" type="email" name="email" placeholder="Enter Email">
                    <input class="registerInput" type="password" name="password" placeholder="Enter Password">
                    {{ csrf_field() }}
                    <button class="registerButton" type="submit">Submit</button>
                </form>
            </div>
        </div>

    @endif

</body>
</html>
