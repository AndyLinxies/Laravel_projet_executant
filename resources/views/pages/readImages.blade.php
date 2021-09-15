@extends('dashboard')
@section('content_bo')
<table class="table-auto text-center">
    <thead>
        <tr class='bg-purple-600 bg-opacity-100 td'>
            <th class='w-1/4 h-1/2'>#</th>
            <th class='w-1/2'>Image Name</th>
            <th class='w-1/4'>Image</th>
            <th class='w-1/4'>Image Category</th>
            <th class='w-1/4'></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($images as $image)
            <tr class='bg-purple-600 bg-opacity-50 h-14 border-b-2 border-purple-900 td '>
                <td >{{$image->id}}</td>
                <td class='m-5'>{{$image->src}}</td>
                <td>
                    <img width='200px' src="{{asset('img/'.$image->src)}}" class='img-responsive rounded-full my-1'>
                </td>
                <td>{{$image->categories->name}}</td>
                <td class="mt-1 td"> 
                    <form action="/dashboard/images/{{$image->id}}" method='post'>
                        @csrf
                        @method('delete')
                        <button type='submit' class="px-3 py-2 ml-1  font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-red-600 rounded-md dark:bg-gray-800 hover:bg-green-500 dark:hover:bg-gray-700 focus:outline-none focus:bg-blue-500 dark:focus:bg-gray-700 mr-2">Delete</button>
                    </form>
                </td>
                
            </tr>
        @endforeach
    </tbody>
</table>
<a href="/dashboard/images/create" class="px-4 py-2 mt-8  font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-gray-600 rounded-md dark:bg-gray-800 hover:bg-blue-500 dark:hover:bg-gray-700 focus:outline-none focus:bg-blue-500 dark:focus:bg-gray-700">Ajouter une image</a>

@endsection