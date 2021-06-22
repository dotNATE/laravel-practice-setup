<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>

    <a href="/"><h1>Nathaniel's Pain</h1></a>

    @if(session('isLoggedIn') === true)
        <h3>Welcome back {{ session('userName') }}</h3>
        <a href="user/logout/">Logout</a>
        <br><br>
        @yield('content')
    @else

        <h3>Sign in</h3>
        <form action="/user/login" method="post">
            <input type="text" name="name" placeholder="Enter Username">
            <input type="password" name="password" placeholder="Enter Password">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <button type="submit">Submit</button>
        </form>

        <h3>...or sign <em>up</em></h3>
        <form action="/user/create" method="post">
            <input type="text" name="name" placeholder="Enter Username">
            <input type="email" name="email" placeholder="Enter Email">
            <input type="password" name="password" placeholder="Enter Password">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <button type="submit">Submit</button>
        </form>

    @endif

</body>
</html>
