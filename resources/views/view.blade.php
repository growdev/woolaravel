<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Site') }}
        </h2>
    </x-slot>
    <div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-6">
                <div class="px-4 sm:px-6 lg:px-8 py-6">
                    <livewire:view :site="$site"/>
                </div>
            </div>
        </div>
    </div>
    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-6">
                <div class="px-4 sm:px-6 lg:px-8 py-6">
                    <livewire:orders :site="$site"/>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>>
