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
    <div class="flex items-center space-y-2">
        <h1 class="text-white text-2xl">e-Ticket</h1>
    </div>
    <ul class="flex space-x-2 text-white items-center">
        <a href="{{ route('dashboard') }}">Dashboard</a>
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
    <div>
        <h2 class="text-2xl font-bold mb-2">Trains</h2>
    </div>
    <div>
        <table class="w-full table-auto">
            <thead>
                <tr>
                    <td class="border border-black px-2 py-4 text-left">Name</td>
                    <td class="border border-black px-2 py-4 text-center">Date</td>
                    <td class="border border-black px-2 py-4 text-center">Start Time</td>
                    <td class="border border-black px-2 py-4 text-center">Manage</td>
                </tr>
            </thead>
            <tbody>
                @foreach($trains as $train)
                    <tr>
                        <td class="border border-black px-2 py-4 text-left">{{ $train->name }}</td>
                        <td class="border border-black px-2 py-4 text-center">{{ $train->date }}</td>
                        <td class="border border-black px-2 py-4 text-center">{{ $train->start_time }}</td>
                        <td class="border border-black px-2 py-4 text-center">
                            <a href="{{ route('trains.show', $train->id) }}" class="bg-indigo-500 px-4 py-2 text-white rounded">Show</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
