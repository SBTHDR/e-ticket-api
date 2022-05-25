@extends('layouts.app')

@section('content')
    <section class="login pt-36">
        <div class="min-h-full flex items-center justify-center">
            <div class="max-w-md w-full space-y-8 bg-white p-5 rounded-md shadow-md">
                <form class="mt-8 space-y-6" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="rounded-md shadow-sm -space-y-px">
                        <div>
                            <label for="email" class="">Email</label>
                            <input type="email" id="email" name="email" class="border rounded border-gray-400 p-2 w-full mb-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Enter your email id...">

                            @error('email')
                                <div class="font-medium text-red-600">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>
                        <div>
                            <label for="password" class="">Password</label>
                            <input type="password" id="password" name="password" class="border rounded border-gray-400 p-2 w-full mb-2 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" placeholder="Enter your password...">
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember_me" name="remember" type="checkbox"
                                   class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            <label for="remember_me" class="ml-2 block text-sm text-gray-900">
                                Remember me
                            </label>
                        </div>

                        <div class="text-sm">
                            <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
                                Don't have a account?
                            </a>
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                                class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <!-- Heroicon name: solid/lock-closed -->
                            <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                 aria-hidden="true">
                                <path fill-rule="evenodd"
                                      d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                      clip-rule="evenodd" />
                            </svg>
                        </span>
                            Sign in
                        </button>
                    </div>
                </form>
                <p class="text-center text-gray-500 text-xs">
                    &copy; 2022 e-ticket BD. All rights reserved.
                </p>
            </div>
        </div>

    </section>

@endsection
