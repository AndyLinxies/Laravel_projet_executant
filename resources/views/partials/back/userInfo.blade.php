@extends('dashboard')
@section('content_bo')
<div>
    <div class="max-w-xs mx-auto overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">
        <img class="object-cover w-full h-56" src="{{asset('img/'.$avatar)}}" alt="avatar">
        
        <div class="py-5 text-center">
            <a href="#" class="block text-2xl font-bold text-gray-800 dark:text-white">{{Auth::user()->firstName}} {{Auth::user()->lastName}}</a>
            <p class="text-sm text-gray-700 dark:text-gray-200">Age: {{Auth::user()->age}}</p>
            <p class="text-sm text-gray-700 dark:text-gray-200">Email: {{Auth::user()->email}}</p>
            <p class="text-sm text-gray-700 dark:text-gray-200">Role: {{Auth::user()->roles->role}}</p>
            <div class='mt-3'>

                <a href="/dashboard/userInfo/{{Auth::user()->id }}/edit" class="px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-green-600 rounded-md dark:bg-gray-800 hover:bg-green-500 dark:hover:bg-gray-700 focus:outline-none focus:bg-blue-500 dark:focus:bg-gray-700">Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection