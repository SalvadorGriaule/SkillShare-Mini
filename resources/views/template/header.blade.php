<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title }}</title>
    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css'])
</head>

<body>
    <header class="w-full bg-orange-500 text-white flex justify-between items-center p-1.5">
        <a href="/">
            <h1 class="text-3xl font-semibold">Skill</h1>
        </a>
        <nav>
            <ul class="flex space-x-1.5">
                @guest
                <a href="/login">
                    <li>connect</li>
                </a>
                <a href="/sign">
                    <li>inscription</li>
                </a>
                @endguest
                @auth
                <a href="/profile">
                    <li>profile</li>
                </a><a href="/skill">
                    <li>skill</li>
                </a>
                <a href="/logout">
                    <li>disconnect</li>
                </a>
                @endauth
            </ul>
                
        </nav>
    </header>
