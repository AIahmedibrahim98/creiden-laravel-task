<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users List') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-gray">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(session()->has('success'))
                        <!-- Info -->
                        <div class="px-8 py-6 bg-blue-400 text-white flex justify-between rounded">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-6" viewBox="0 0 20 20"
                                     fill="currentColor">
                                    <path
                                        d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z"/>
                                </svg>
                                <p>{{session('success')}}</p>
                            </div>
                        </div>
                    @endif
                    @if(session()->has('error'))
                        <!-- Danger -->
                        <div class="px-8 py-6 bg-red-400 text-white flex justify-between rounded">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mr-6" viewBox="0 0 20 20"
                                     fill="currentColor">
                                    <path fill-rule="evenodd"
                                          d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                          clip-rule="evenodd"/>
                                </svg>
                                <p>{{session('success')}}</p>
                            </div>
                        </div>
                    @endif
                    <div class="flex justify-end m-2">
                        <a href="{{ route('admin.users.create') }}"
                           class="bg-green-800 hover:bg-green-900 text-white font-bold py-2 px-4 rounded">{{__('Add New User')}}</a>
                    </div>
                    <table class="table-auto w-full">
                        <thead>
                        <tr>
                            <th class="px-4 py-2">#</th>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Created At</th>
                            <th class="px-4 py-2">Updated At</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $key => $user)
                            <tr>
                                <td class="border px-4 py-2">{{ $users->firstItem() + $key }}</td>
                                <td class="border px-4 py-2">
                                    <a class="text-gray-800 font-bold italic" href="{{ route('admin.users.show', $user->id) }}">{{ $user->name }}</a>
                                </td>
                                <td class="border px-4 py-2">{{ $user->email }}</td>
                                <td class="border px-4 py-2">{{ date_format($user->created_at,'Y-m-d h:i:s a') }}</td>
                                <td class="border px-4 py-2">{{ date_format($user->updated_at,'Y-m-d h:i:s a') }}</td>
                                <td class="border px-4 py-2">
                                    <div class="flex justify-between">
                                        <a href="{{ route('admin.users.edit', $user->id) }}"
                                           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="m-3">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
