@extends('dashboard')
@section('content_bo')
<main class=" mt-5">
    <div class="grid grid-flow-col">
        @foreach ($images as $image)
            
        <div class="max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">
            <img class="object-cover object-center w-full h-56" src="{{asset('img/'.$image->src)}}" alt="avatar">
            
            <div class="flex items-center px-6 py-3 bg-gray-900 text-center justify-between">
                <h1 class="mx-3 text-lg font-semibold text-white ">Category: {{$image->categories->name}}</h1>
                <a href="/galleries/{{$image->id}}/download">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 bg-white rounded-full" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13l-3 3m0 0l-3-3m3 3V8m0 13a9 9 0 110-18 9 9 0 010 18z" />
                </svg>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</main>
@endsection