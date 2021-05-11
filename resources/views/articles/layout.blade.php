<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta neme="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
    <title>Laravel News</title>
</head>

<body>
    <nav class="main-header">
        <div class="nav-bar">
            <a href="{{route('home')}}" class="nav-link">Laravel News</a>
        </div>
    </nav>
    @yield('contents')
</body>

</html>