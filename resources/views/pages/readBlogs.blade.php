
@extends('dashboard')
@section('content_bo')
    <main class=" mt-5">
        <div class="flex justify-center">
        @auth
        @if (Auth::user()->role_id == 1||Auth::user()->role_id == 3)
        
        <a href="/dashboard/blogs/create" class=" px-4 py-2 mt-8  font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-gray-600 rounded-md dark:bg-gray-800 hover:bg-blue-500 dark:hover:bg-gray-700 focus:outline-none focus:bg-blue-500 dark:focus:bg-gray-700">Créer un article</a>
        @endif
        @endauth
</div>
        <div class="block">
            @foreach ($blogs as $blog)

                <div class="max-w-2xl px-8 py-4 mx-auto bg-white rounded-lg shadow-md dark:bg-gray-800 mt-7 td">
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-light text-gray-600 dark:text-gray-400">{{$blog->created_at}}</span>
                        @can('web',$blog)
                            <form action="/dashboard/blogs/{{$blog->id}}" method='post'>
                                @csrf
                                @method('delete')
                                <button type='submit' class="px-3 py-1 text-sm font-bold text-gray-100 transition-colors duration-200 transform bg-red-900 rounded cursor-pointer hover:bg-gray-500">Delete</button>
                            </form>
                            @endcan
                    </div>

                    <div class="mt-2">
                        <p 
                            class="text-2xl font-bold text-gray-700 dark:text-white hover:text-gray-600 dark:hover:text-gray-200 ">{{$blog->titre}}</p>
                        <p class="mt-2 text-gray-600 dark:text-gray-300">{{$blog->texte}}</p>
                    </div>

                    <div class="flex items-center justify-between mt-4">
                        @can('web',$blog)
                        <a href="/dashboard/blogs/{{$blog->id}}/edit" class="text-blue-600 dark:text-blue-400 hover:underline">Edit</a>
                        @endcan
                        <div class="flex items-center">
                            <img class="hidden object-cover w-10 h-10 mx-4 rounded-full sm:block"
                                src="{{asset('img/'.$blog->users->avatars->src)}}"
                                alt="avatar">
                            <a class="font-bold text-gray-700 cursor-pointer dark:text-gray-200">{{$blog->users->firstName}} {{$blog->users->lastName}}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
@endsection
