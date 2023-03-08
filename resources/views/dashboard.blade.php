<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-6">
                <div class="px-4 sm:px-6 lg:px-8 py-6">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900">WooCommerce Sites</h1>
                            <p class="mt-2 text-sm text-gray-700">A list of all the connected WooCommerce shops.</p>
                        </div>
                        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
                            <a href="/connect" class="block rounded-md bg-indigo-600 py-1.5 px-3 text-center text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Connect site</a>
                        </div>
                    </div>

                    @if (session()->has('success'))
                        <div class="alert alert-success py-4 border-1 mt-2 bg-green-300 rounded-md px-3 color-green-800">
                            {{ session('success') }}
                        </div>
                    @endif

                    <livewire:dashboard />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
