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
                        <label for="created_at" class="mb-2 uppercase font-bold text-lg text-grey-darkest">Created At</label>
                        <input type="text" name="created_at" id="created_at" class="border py-2 px-3 text-grey-darkest"
                               value="{{ date_format($user->created_at,'Y-m-d h:i:s a') }}" disabled>
                    </div>
                    <div class="flex flex-col mt-4">
                        <label for="updated_at" class="mb-2 uppercase font-bold text-lg text-grey-darkest">Updated At</label>
                        <input type="text" name="updated_at" id="updated_at" class="border py-2 px-3 text-grey-darkest"
                               value="{{ date_format($user->updated_at,'Y-m-d h:i:s a') }}" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
