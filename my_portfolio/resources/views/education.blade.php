@extends('layout')
@section('content')
<div class="mx-4">
    <div class="bg-gray-50 border border-gray-200 p-24 rounded">
        @foreach ($educations as $item)
        <div class="bg-gray-50 border border-gray-200 rounded p-6">
            <h1 class="text-5xl font-bold" style="margin: 2%">
                {{$item['place']}}
            </h1>
            <div class="flex">
                <img
                    class="hidden w-48 mr-6 md:block"
                    src="{{asset($item['image'])}}"
                    alt=""
                />
                <div>
                    <p class="text-4xl ">{{$item['content']}}</p>
                </div>
            </div class="flex">
            @php
                 $skills = explode(",",$item['skills']);
                @endphp
                <div class=" justify-content-center " style="margin: 1%" > 
                    <a class="text-5xl font-bold" style="margin-right: 5% ; margin-left: 2% ;color: rgb(0, 0, 0)">Skills :</a> 
                    @foreach($skills as $skill)
                    <i class="items-center justify-center text-white rounded-xl py-3 px-5 mr-2 text-xs" style="background-color: brown" ><a href="">{{$skill}}</a></i>
                    @endforeach
                </div> 
        </div>
        @endforeach
    </div>
</div>
@endsection