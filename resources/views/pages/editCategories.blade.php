@extends('dashboard')
@section('content_bo')
    <div class="container bg-light">
        <section class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800">
            <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white">Edit Categories</h2>
            <form action='/dashboard/categories/{{ $edit->id }}' method="post">
                @method('PUT')
                @csrf
                <div class="grid grid-cols-1 gap-6 mt-4 sm:grid-cols-2">
                    <div>
                        <label class="text-gray-700 dark:text-gray-200" for="name">Category's Name</label>
                        <input id="name" name='name' value='{{ $edit->name }}' type="text"
                            class="block w-full px-4 py-2 mt-2 text-gray-700 bg-white border border-gray-300 rounded-md dark:bg-gray-800 dark:text-gray-300 dark:border-gray-600 focus:border-blue-500 dark:focus:border-blue-500 focus:outline-none focus:ring   @error('name') is-invalid @enderror">
                        @error('name')
                            <span class="invalid-feedback"> <strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-end mt-6">
                    <button type='submit'
                        class="px-6 py-2 leading-5 text-white transition-colors duration-200 transform bg-gray-700 rounded-md hover:bg-gray-600 focus:outline-none focus:bg-gray-600">Save</button>
                </div>
            </form>
        </section>
    </div>
@endsection
