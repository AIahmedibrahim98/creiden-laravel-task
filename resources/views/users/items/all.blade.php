<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Items') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-gray">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white border-b border-gray-200 m-5">
                    <x-message-alert></x-message-alert>
                    <div class="flex justify-end m-2">
                        <a href="{{ route('users.items.create',auth()->id()) }}"
                           class="bg-green-800 hover:bg-green-900 text-white font-bold py-2 px-4 rounded">{{__('Add New Item')}}</a>
                    </div>
                    <table class="table-auto w-full ">
                        <thead>
                        <tr>
                            <th class="px-4 py-2">#</th>
                            <th class="px-4 py-2">Title</th>
                            <th class="px-4 py-2">Content</th>
                            <th class="px-4 py-2">Created At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $key => $item)
                            <tr>
                                <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="border px-4 py-2">
                                    {{$item->title }}
                                </td>
                                <td class="border px-4 py-2">{{ $item->content }}</td>
                                <td class="border px-4 py-2">{{ date_format(date_create($item->date),'Y-m-d h:i:s a') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
