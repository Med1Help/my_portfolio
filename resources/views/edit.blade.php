@extends('layout')
@section('content')
<div
class="bg-gray-50 border border-gray-200 p-10 rounded max-w-lg mx-auto mt-24"
>
<header class="text-center">
    <h2 class="text-2xl font-bold uppercase mb-1">
        Edit Project
    </h2>
</header>

<form method="POST" action="./editproject/{{$project->id}}" enctype="multipart/form-data">
    @csrf
    <div class="mb-6">
        <label
            for="title"
            class="inline-block text-lg mb-2"
            >Project title </label
        >
        <input
            type="text"
            class="border border-gray-200 rounded p-2 w-full"
            name="title"
            value="{{$project->title}}"
        />
        @error('title')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    

    <div class="mb-6">
        <label
            for="github_repo"
            class="inline-block text-lg mb-2"
        >
            Github repo
        </label>
        <input
            type="text"
            class="border border-gray-200 rounded p-2 w-full"
            name="github_repo"
            value="{{$project->github_repo}}"
        />
        @error('github_repo')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label for="techs" class="inline-block text-lg mb-2">
            Techs
        </label>
        <input
            type="text"
            class="border border-gray-200 rounded p-2 w-full"
            name="techs"
            placeholder="Example: Laravel, springboot, Postgres, etc"
            value="{{$project->techs}}"
        />
        @error('techs')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label for="image_url" class="inline-block text-lg mb-2">
            Project Logo
        </label>
        <input
            type="file"
            class="border border-gray-200 rounded p-2 w-full"
            name="image_url"
        />
        <img
                            class="w-48 mr-6 mb-6"
                            src="{{asset($project['image_url'])}}"
                            alt=""
                        />
    </div>

    <div class="mb-6">
        <label
            for="description"
            class="inline-block text-lg mb-2"
        >
            Project Description
        </label>
        <textarea
            class="border border-gray-200 rounded p-2 w-full"
            name="description"
            rows="7"
            placeholder="Include tasks, requirements, salary, etc"
        >{{$project->description}}</textarea>
        @error('description')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-6">
        <button
            class="bg-laravel text-white rounded py-2 px-4 hover:bg-black"
        >
            Edit Project
        </button>

        <a href="../" class="text-black ml-4"> Back </a>
    </div>
</form>
</div>
@endsection