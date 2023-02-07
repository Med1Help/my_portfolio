@extends('layout')
@section('content')
<div
class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
>
<header class="text-center">
    <h2 class="text-2xl font-bold uppercase mb-1">
        Login 
    </h2>
</header>

<form method="POST" action="./login" enctype="multipart/form-data">
    @csrf
    <div class="mb-6">
        <label
            for="email"
            class="inline-block text-lg mb-2"
            >E-mail </label
        >
        <input
            type="text"
            class="border border-gray-200 rounded p-2 w-full"
            name="email"
        />
        @error('email')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label for="password" class="inline-block text-lg mb-2">
            Password
        </label>
        <input
            type="password"
            class="border border-gray-200 rounded p-2 w-full"
            name="password"
            placeholder="Example: Laravel, springboot, Postgres, etc"
        />
        @error('password')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-6">
        <button
            class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
        >
            Login
        </button>

        <a href="../" class="text-black ml-4"> Back </a>
    </div>
</form>
</div>
@endsection