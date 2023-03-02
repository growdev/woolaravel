<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Connect') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-6">
                <div class="px-4 sm:px-6 lg:px-8 py-6 text-center">
                    <h2 class="mx-10">Connect a WooCommerce Site </h2>
                    <livewire:connect />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
