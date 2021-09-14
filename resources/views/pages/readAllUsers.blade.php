@extends('dashboard')
@section('content_bo')
<table class="table-auto text-center">
    <thead>
        <tr class='bg-purple-600 bg-opacity-100 h-10 alert-dismissible w-full'>
            <th class='w-1/4'>#</th>
            <th class='w-1/4'>Fist Name</th>
            <th class='w-1/4'>Last Name</th>
            <th class='w-1/4'>Age</th>
            <th class='w-1/4'>Avatar_id|</th>
            <th class='w-1/4'>Role_id</th>
            <th class='w-1/4'>Email</th>
            <th class='w-1/4'></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr class='bg-purple-600 bg-opacity-50 h-14 '>
                <td>{{$user->id}}</td>
                <td class='m-5 '>{{$user->firstName}}</td>
                <td class='m-5'>{{$user->lastName}}</td>
                <td class='m-5'>{{$user->age}}</td>
                <td >{{$user->avatar_id}}</td>
                <td>{{$user->role_id}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <a href="/dashboard/users/{{$user->id }}/edit" class="ml-2 px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-200 transform bg-green-600 rounded-md dark:bg-gray-800 hover:bg-green-500 dark:hover:bg-gray-700 focus:outline-none focus:bg-blue-500 dark:focus:bg-gray-700">Edit</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="px-5 bg-white py-5 flex flex-col xs:flex-row items-center xs:justify-between">
    <div class="flex items-center">
        {{$users->links()}}
    </div>
</div>

@endsection