@extends('layout')
@section('content')
 @include("partials._hero")
 @include("partials._search")
 <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
    @unless (count($projects) == 0)
    @foreach ($projects as $item)
    <div class="bg-gray-50 border border-gray-200 rounded p-6">
        <h3 class="text-5xl"style="margin:2%">
            <a href="./projects/{{$item['id']}}" ><h1>{{$item['title']}}</h1></a>
        </h3>
        <div class="flex">
            <img
                class="hidden w-48 mr-6 md:block"
                src="{{asset($item['image_url'])}}"
                alt=""
            />
            <div>
                <p>{{$item['description']}}</p>
                {{-- <a href="./projects/{{$item['id']}}" >{{$item['github_repo']}}</a> --}}
            </div>
        </div>
    </div>
    @endforeach
    @else 
    <h1>No Projects found</h1>   
    @endunless
 </div>     
@endsection
