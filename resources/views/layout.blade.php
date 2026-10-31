<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Laravel POS</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background: #f4f6f8; color: #222; }
        nav { background: #1f3a5f; padding: 14px 24px; }
        nav a { color: #fff; text-decoration: none; margin-right: 20px; font-weight: bold; }
        nav a:hover { text-decoration: underline; }
        main { max-width: 900px; margin: 30px auto; background: #fff; padding: 24px 32px; border-radius: 8px; }
        table { width: 100%; border-collapse: collapse; margin-top: 16px; }
        th, td { border: 1px solid #ccc; padding: 8px 12px; text-align: left; }
        th { background: #e8eef5; }
        .btn { display: inline-block; background: #1f3a5f; color: #fff; padding: 8px 16px; border: none; border-radius: 4px; text-decoration: none; cursor: pointer; font-size: 14px; }
        .btn:hover { background: #2b4e7e; }
        .link { color: #1f3a5f; font-weight: bold; }
        .success { background: #d4edda; color: #155724; padding: 10px 14px; border-radius: 4px; margin-bottom: 16px; }
        .error { color: #b00020; font-size: 14px; margin-top: 4px; }
        .field { margin-bottom: 16px; }
        .field label { display: block; font-weight: bold; margin-bottom: 4px; }
        .field input[type="text"], .field input[type="email"] { width: 100%; max-width: 420px; padding: 8px; border: 1px solid #aaa; border-radius: 4px; box-sizing: border-box; }
        .avatar { width: 48px; height: 48px; border-radius: 50%; object-fit: cover; }
        .avatar-big { width: 100px; height: 100px; border-radius: 50%; object-fit: cover; display: block; margin-bottom: 8px; }
    </style>
</head>
<body>
    {{-- Navigation shared by all pages --}}
    <nav>
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('about') }}">About</a>
        <a href="{{ route('customers') }}">Customer Accounts</a>
        <a href="{{ route('users') }}">User Accounts</a>
    </nav>

    <main>
        {{-- Message saved by the controller after a successful create or update --}}
        @if (session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

        @yield('content')
    </main>
</body>
</html>
