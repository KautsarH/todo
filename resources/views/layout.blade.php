<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'To do list')</title>
</head>
<body>
    
    <ul>
        <a href="/">Home</a>
        <a href="/todo">To do list</a>
    </ul>
    @yield('content')
</body>
</html>