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
    <div class="px-4 text-2xl font-bold">
        Add Train
    </div>
    <div>
        <form action="{{ route('add-train') }}" method="POST">
            @csrf
            <div class="flex mb-6 items-center">

                <div class="flex-1 px-4">
                    <label for="name" class="">Name</label>
                    <input type="text" name="name" id="name" class="w-full px-4 py-2">

                    @error('name')
                    <p class="text-red-400 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex-1 px-4">
                    <label for="date" class="">Date</label>
                    <input type="text" name="date" id="date" class="w-full px-4 py-2">

                    @error('date')
                    <p class="text-red-400 text-sm">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <div class="flex mb-6">

                <div class="flex-1 px-4">
                    <label for="station_id" class="">Station ID</label>
                    <select name="station_id" id="station_id" class="w-full px-4 py-2">
                        <option value="">Select a station</option>
                        @foreach($stations as $station)
                            <option value="{{ $station->id }}">{{ $station->name }}</option>
                        @endforeach
                    </select>

                    @error('station_id')
                        <p class="text-red-400 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex-1 px-4">
                    <label for="start_time" class="">Start Time</label>
                    <input type="text" name="start_time" id="start_time" class="w-full px-4 py-2">

                    @error('start_time')
                    <p class="text-red-400 text-sm">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <button type="submit" class="bg-indigo-500 py-2 px-4 text-white mx-4">Save</button>
        </form>
    </div>
</div>
</body>
</html>
