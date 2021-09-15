@extends('dashboard')
@section('content_bo')
<table class="table-auto text-center">
    <thead>
        <tr class='bg-purple-600 bg-opacity-100 h-10 td'>
            <th class='w-1/4'>#</th>
            <th class='w-1/2'>Category's Name</th>
            <th class='w-1/4'></th>
            <th class='w-1/4'></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $categorie)
            <tr class='bg-purple-600 bg-opacity-50 h-11 border-b-2 border-purple-900 td'>
                <td>{{$categorie->id}}</td>
                <td>{{$categorie->name}}</td>
                <td class="mt-1"> 
                    <form action="/dashboard/categories/{{$categorie->id}}" method='post'>
                        @csrf
                        @method('delete')
                        <button type='submit' class="px-3 py-2 ml-1  font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-red-600 rounded-md dark:bg-gray-800 hover:bg-green-500 dark:hover:bg-gray-700 focus:outline-none focus:bg-blue-500 dark:focus:bg-gray-700">Delete</button>
                    </form>
                </td>
                    <td class="mt-1">
                        <a href="/dashboard/categories/{{$categorie->id }}/edit" class="px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-green-600 rounded-md dark:bg-gray-800 hover:bg-green-500 dark:hover:bg-gray-700 focus:outline-none focus:bg-blue-500 dark:focus:bg-gray-700">Edit</a>
                    </td>
                
            </tr>
        @endforeach
    </tbody>
</table>
<a href="/dashboard/categories/create" class="px-4 py-2 mt-8  font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-gray-600 rounded-md dark:bg-gray-800 hover:bg-blue-500 dark:hover:bg-gray-700 focus:outline-none focus:bg-blue-500 dark:focus:bg-gray-700">Ajouter une categorie</a>

@endsection