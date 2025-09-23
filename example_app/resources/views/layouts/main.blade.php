<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
<div>
    <div>
        <nav>
            <ul>
                <li><a href="{{route('main.index')}}">Главная страница</a></li>
                <li><a href="{{route('about.index')}}">Обо мне</a></li>
                <li><a href="{{route('post.index')}}">Посты</a></li>
                <li><a href="{{route('contact.index')}}">Контакты</a></li>
            </ul>
        </nav>
    </div>
    @yield('content')
</div>
</body>
</html>
