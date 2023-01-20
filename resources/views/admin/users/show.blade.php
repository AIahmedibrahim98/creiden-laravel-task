<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-gray">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{--Show User Details--}}
                    <div class="flex flex-col">
                        <label for="name" class="mb-2 uppercase font-bold text-lg text-grey-darkest">Name</label>
                        <input type="text" name="name" id="name" class="border py-2 px-3 text-grey-darkest"
                               value="{{ $user->name }}" disabled>
                    </div>
                    <div class="flex flex-col mt-4">
                        <label for="email" class="mb-2 uppercase font-bold text-lg text-grey-darkest">Email</label>
                        <input type="email" name="email" id="email" class="border py-2 px-3 text-grey-darkest"
                               value="{{ $user->email }}" disabled>
                    </div>
                    <div class="flex flex-col mt-4">
                        <label for="created_at" class="mb-2 uppercase font-bold text-lg text-grey-darkest">Created
                            At</label>
                        <input type="text" name="created_at" id="created_at" class="border py-2 px-3 text-grey-darkest"
                               value="{{ date_format($user->created_at,'Y-m-d h:i:s a') }}" disabled>
                    </div>
                    <div class="flex flex-col mt-4">
                        <label for="updated_at" class="mb-2 uppercase font-bold text-lg text-grey-darkest">Updated
                            At</label>
                        <input type="text" name="updated_at" id="updated_at" class="border py-2 px-3 text-grey-darkest"
                               value="{{ date_format($user->updated_at,'Y-m-d h:i:s a') }}" disabled>
                    </div>

                    <p class="text-lg font-bold m-5 text-blue-800">ITEMS</p>
                    {{--Show Items of user form wordpress--}}
                    <div class="flex justify-end m-2">
                        <a href="{{ route('admin.users.items.create',$user->id) }}"
                           class="bg-green-800 hover:bg-green-900 text-white font-bold py-2 px-4 rounded">{{__('Add New Item')}}</a>
                    </div>
                    <x-message-alert></x-message-alert>
                    <table class="table-auto w-full">
                        <thead>
                        <tr>
                            <th class="px-4 py-2">#</th>
                            <th class="px-4 py-2">Title</th>
                            <th class="px-4 py-2">Content</th>
                            <th class="px-4 py-2">Created At</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($user->items() as $key => $item)
                            <tr>
                                <td class="border px-4 py-2">{{ ++ $key }}</td>
                                <td class="border px-4 py-2">
                                    {{$item->title }}
                                </td>
                                <td class="border px-4 py-2">{{ $item->content }}</td>
                                <td class="border px-4 py-2">{{ date_format(date_create($item->date),'Y-m-d h:i:s a') }}</td>
                                <td class="border px-4 py-2">
                                    <div class="flex justify-between">
                                        <a href="{{ route('admin.users.items.edit', [$item->id,$user->id]) }}"
                                           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                                        <form action="{{ route('admin.users.items.destroy', $item->id) }}"
                                              method="POST">
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
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
