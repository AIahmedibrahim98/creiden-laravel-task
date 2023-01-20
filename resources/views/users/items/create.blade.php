<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create item') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-gray">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{--User Form--}}
                    <form action="{{ route('users.items.store') }}" method="POST">
                        @csrf
                        <div class="flex flex-col">
                            <label for="title" class="mb-2 uppercase font-bold text-lg text-grey-darkest">Title</label>
                            <input type="text" name="title" id="title" class="border py-2 px-3 text-grey-darkest"
                                   value="{{ old('title') }}">
                            @error('title')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="flex flex-col mt-4">
                            <label for="content" class="mb-2 uppercase font-bold text-lg text-grey-darkest">Content</label>
                            <textarea name="content">{{ old('content') }}</textarea>
                            @error('content')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="flex justify-end mt-4">
                            <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
