<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>e-Ticket</title>
</head>
<body>
    <nav class="bg-indigo-500 p-5 flex justify-between items-center">
        <div>
            <h1 class="text-white text-2xl">e-Ticket</h1>
        </div>
        <ul class="flex space-x-2 text-white items-center">
            @auth
                <li>{{ auth()->user()->name }}</li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-indigo-700">
                        Logout
                    </button>
                </form>
            @endauth
        </ul>
    </nav>
    <div class="container mx-auto bg-indigo-100 rounded-lg w-4/5 mt-5 p-10">
        Home
    </div>
</body>
</html>
