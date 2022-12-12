<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Website Product')</title>
    <link rel="stylesheet" href="{{ asset('assets/style/css/style.css') }}">
    @vite('resources/css/app.css')
</head>
<body>

    <div class="container">
        <h1 class="text-4xl text-slate-400 font-bold text-center">Website Product</h1>
        @yield('content_master')
    </div>
    
</body>
</html>