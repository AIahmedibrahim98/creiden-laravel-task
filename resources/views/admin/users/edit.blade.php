<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-gray">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{--User Update Form--}}
                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="flex flex-col">
                            <label for="name" class="mb-2 uppercase font-bold text-lg text-grey-darkest">Name</label>
                            <input type="text" name="name" id="name" class="border py-2 px-3 text-grey-darkest"
                                   value="{{ $user->name }}">
                            @error('name')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="flex flex-col mt-4">
                            <label for="email" class="mb-2 uppercase font-bold text-lg text-grey-darkest">Email</label>
                            <input type="email" name="email" id="email" class="border py-2 px-3 text-grey-darkest"
                                   value="{{ $user->email }}">
                            @error('email')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="flex flex-col mt-4">
                            <label for="password"
                                   class="mb-2 uppercase font-bold text-lg text-grey-darkest">Password</label>
                            <input type="password" name="password" id="password"
                                   class="border py-2 px-3 text-grey-darkest">
                            @error('password')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="flex flex-col mt-4">
                            <label for="password_confirmation"
                                   class="mb-2 uppercase font-bold text-lg text-grey-darkest">Confirm
                                Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                   class="border py-2 px-3 text-grey-darkest">
                            @error('password_confirmation')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="flex justify-end mt-4">
                            <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
