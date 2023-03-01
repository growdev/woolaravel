<div>
    <label for="company-website" class="block text-sm font-medium text-gray-700 mt-5">Your store's URL:</label>
    <div class="relative mt-1 rounded-md shadow-sm">
        <input wire:model="url" type="text" name="url" id="url" class="block w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500  sm:text-sm" placeholder="https://www.example.com">
        @error('url') <span class="error">{{ $message }}</span> @enderror
    </div>

    <div class="py-5 w-24 flex">
        <button wire:click="goToSite" type="button" class="inline-flex items-center rounded-md border border-transparent bg-indigo-600 px-3 text-sm font-medium leading-4 text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 mr-4">Connect</button>
        <button wire:click="back" type="button" class="inline-flex items-center rounded-md border border-transparent bg-indigo-100 px-3 py-2 text-sm font-medium leading-4 text-indigo-700 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Cancel</button>
    </div>
</div>
