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
                    <x-message-alert></x-message-alert>
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
