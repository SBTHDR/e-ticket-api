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
        <h2 class="text-2xl font-bold mb-2">Train</h2>
    </div>
    <div>
        <table class="w-full table-auto">
            <thead>
                <tr>
                    <td class="border border-black px-2 py-4 text-left">Train Name</td>
                    <td class="border border-black px-2 py-4 text-center">Departure Date</td>
                    <td class="border border-black px-2 py-4 text-center">Departure Time</td>
                    <td class="border border-black px-2 py-4 text-center">Manage</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border border-black px-2 py-4 text-left">{{ $train->name }}</td>
                    <td class="border border-black px-2 py-4 text-center">{{ $train->date }}</td>
                    <td class="border border-black px-2 py-4 text-center">{{ $train->start_time }}</td>
                    <td class="border border-black px-2 py-4 text-center">
                        <a href="{{ route('trains') }}" class="bg-gray-700 px-4 py-2 text-white rounded">Back</a>
                    </td>
                </tr>
            </tbody>
        </table>


    </div>
</div>

<div class="container mx-auto bg-indigo-100 rounded-lg w-4/5 mt-5 p-10">
    <div>
        <h2 class="text-2xl font-bold mb-2">Bogi</h2>
    </div>
    <div>

        <div class="w-full">
            @foreach ($train->bogis as $bogi)
                <div class="">

                    <div class="bg-white mt-3 p-3">
                        <h3 class="font-medium">Bogi Name: <span class="text-indigo-500">{{ $bogi->name }}</span></h3>
                    </div>

                    <div class="bg-white p-3">
                        <div class="mb-2">Available Seats</div>
                        <ul class="flex flex-wrap">
                            @foreach ($bogi->seats as $seat)
                                <li class="w-32 mr-3 mb-2 p-3 bg-gray-200">{{ $seat->name }}</li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            @endforeach
        </div>

    </div>
</div>
</body>
</html>
