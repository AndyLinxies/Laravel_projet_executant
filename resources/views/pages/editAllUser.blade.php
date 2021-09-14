@extends('dashboard')
@section('content_bo')
<div class="container bg-light">
    <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
        <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Edit user informations</h2>
        <form action='/dashboard/users/{{$edit->id}}' method="post">
            @method('PUT')
            @csrf
            <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="firstName">First Name</label>
                    <input id="firstName" name='firstName' value='{{$edit->firstName}}' type="text"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring   @error('firstName') is-invalid @enderror">
                    @error('firstName')
                        <span class="invalid-feedback"> <strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="firstName">Last Name</label>
                    <input id="lastName" name='lastName' value='{{$edit->lastName}}' type="text"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring   @error('lastName') is-invalid @enderror">
                    @error('lastName')
                        <span class="invalid-feedback"> <strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="age">Age</label>
                    <input id="age" name='age' value='{{$edit->age}}' type="text"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring   @error('age') is-invalid @enderror">
                    @error('age')
                        <span class="invalid-feedback"> <strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                
                

                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="email">E-mail</label>
                    <input id="email" name='email' value='{{ $edit->email }}' type="text"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring   @error('email') is-invalid @enderror">
                    @error('email')
                        <span class="invalid-feedback"> <strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div>
                    <label class="text-gray-700 dark:text-gray-200" for="password">Password</label>
                    <input id="password" name='password'  type="password"
                        class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring   @error('password') is-invalid @enderror">
                    @error('password')
                        <span class="invalid-feedback"> <strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>
            {{-- role --}}
            <div class="mt-4">
                <x-label for="role" :value="__('Role')" />
                <select name="role_id" id="role">
                    @foreach ($roles as $role )

                    <option value="{{$role->id}}">{{$role->role}}</option>

                    @endforeach
                </select>
            </div>
            {{--  --}}
            {{-- Avatar --}}
            <div class="mt-4">
                <x-label for="avatar" :value="__('Avatars')" />
                <select name="avatar_id" id="avatar">
                    @foreach ($avatars as $avatar )

                    <option value="{{$avatar->id}}">{{$avatar->name}}</option>

                    @endforeach
                </select>
            </div>
            {{--  --}}
            <div class="flex justify-end mt-6">
                <button type='submit'
                    class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Save</button>
            </div>
        </form>
    </section>
</div>
@endsection