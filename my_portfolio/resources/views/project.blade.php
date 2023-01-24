@extends('layout')
@section('content')
            <div class="mx-4">
                <div class="bg-gray-50 border border-gray-200 p-24 rounded">
                    <div
                        class="flex flex-col items-center justify-center text-center"
                    >
                        <img
                            class="w-48 mr-6 mb-6"
                            src="{{asset($item['image_url'])}}"
                            alt=""
                        />

                        <h3 class="text-2xl mb-2">{{$item['title']}}</h3>
                        
                        @unless(count(json_decode($item['techs'])) == 0 )
                        <div class=" justify-content-center " style="margin: 3%" > 
                            @foreach(json_decode($item['techs']) as $tech)
                                <i class="items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"><a href="">{{$tech}}</a></i>
                            @endforeach
                        </div>    
                        @else
                        NO techs
                        @endunless
                        <div class="border border-gray-200 w-full mb-6"></div>
                        <div>
                            <h3 class="text-3xl font-bold mb-4">
                                Project Description
                            </h3>
                            <div class="text-lg space-y-6">
                                <p>
                                    {{$item['description']}}
                                </p>
                                <a
                                    href="{{$item['github_repo']}}"
                                    class="block text-white mt-6 py-2 rounded-xl hover:opacity-80" style="background-color: rgb(1, 41, 14)" 
                                    ><i class="fa-solid fa-envelope"></i>
                                    Github repo </a
                                >
                                @auth
                                @if(auth()->user()->role == "ADMIN")
                                <a href="../projects/{{$item['id']}}/edit">
                                <i class="fa-solid fa-pencil"></i>Edit
                                </a>
                            <form method="post" action="../project/delete/{{$item['id']}}">
                                @csrf
                                <button class="text-red-500" ><i class="fa-solid fa-trash"></i>Delete</button>
                            </form>
                                @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @unless(count($comments) == 0)
            <div class="bg-gray-50 border border-gray-200 rounded p-6">
                @foreach($comments as $comment)
                <div class="flex">
                    <i class="fa-solid fa-user font-bold uppercase text-white text-6xl " style="color: rgb({{rand(0,255)}}, {{rand(0,255)}}, {{rand(0,255)}}) ; margin-right:3% ;margin-bottom:3%"></i>
                    <div class="text-black text-3xl " style="margin-top:1%">
                        <p>{{$comment['comment']}}</p>
                    </div>
                </div>
                @endforeach
            </div>
            @endunless
        <form method="post" action="../comments/{{$item['id']}}">
            @csrf
            <div class="flex mb-6">
                <input
                    type="text"
                    class="border border-gray-200 rounded p-2 w-full"
                    name="comment"
                />
                @error('comment')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black" style="margin-left: 1%"> Comment</button>
            </div>
        </form>   
@endsection