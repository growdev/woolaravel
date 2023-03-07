<div>
    <form wire:submit.prevent="submitForm" class="space-y-8 divide-y divide-gray-200">

        @if ($successMessage)
            <div class="rounded-md bg-green-50 p-4 mt-8">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                  clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm leading-5 font-medium text-green-800">
                            {{ $successMessage }}
                        </p>
                    </div>
                    <div class="ml-auto pl-3">
                        <div class="-mx-1.5 -my-1.5">
                            <button
                                type="button"
                                wire:click="$set('successMessage', null)"
                                class="inline-flex rounded-md p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:bg-green-100 transition ease-in-out duration-150"
                                aria-label="Dismiss">
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                          clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
            <div class="space-y-6 pt-8 sm:space-y-5 sm:pt-10">
                <div>
                    <h3 class="text-base font-semibold leading-6 text-gray-900">Add Simple Product</h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">Fill out this form to add a simple product to the connected site.</p>
                </div>
                <div class="space-y-6 sm:space-y-5">
                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="name" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Name</label>
                        <div class="mt-2 sm:col-span-2 sm:mt-0">
                            @error('name')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                            <input wire:model.defer="name" type="text" name="name" id="name" class="block w-full max-w-lg rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            <p class="mt-2 text-sm text-gray-500">Name will be used as the product slug.</p>
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="type" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Type</label>
                        <div class="mt-2 sm:col-span-2 sm:mt-0">
                            @error('type')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                            <select wire:model.defer="type" id="type" name="type" autocomplete="type" class="block w-full max-w-lg rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                <option selected>Simple</option>
                            </select>
                            <p class="mt-2 text-sm text-gray-500">Note: Only Simple product type is supported currently.</p>
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="price" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Price</label>
                        <div class="mt-2 sm:col-span-2 sm:mt-0">
                            @error('price')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                            <input wire:model.defer="price" type="text" name="price" id="price"  class="block w-full max-w-lg rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            <p class="mt-2 text-sm text-gray-500">Name will be used as the product slug.</p>
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="description" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Description</label>
                        <div class="mt-2 sm:col-span-2 sm:mt-0">
                            @error('description')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                            <textarea wire:model.defer="description" id="description" name="description" rows="3" class="block w-full max-w-lg rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:py-1.5 sm:text-sm sm:leading-6"></textarea>
                            <p class="mt-2 text-sm text-gray-500">Write a few sentences about this product.</p>
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="category" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Category</label>
                        <div class="mt-2 sm:col-span-2 sm:mt-0">
                            <select wire:model.defer="category" id="category" name="category" autocomplete="category" class="block w-full max-w-lg rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                <option>-- Select a Category --</option>
                                @foreach ( $categories as $category )
                                    @if ( is_array( $category) )
                                        <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                    @else
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="pt-6 sm:pt-5 sm:border-t">
                        <div class="sm:grid sm:grid-cols-3 sm:items-baseline sm:gap-4">
                            <div>
                                <div class="text-sm font-semibold leading-6 text-gray-900" id="label-notifications">Status</div>
                            </div>
                            <div class="sm:col-span-2">
                                <div class="max-w-lg">
                                    <p class="text-sm text-gray-500">Status of the product in the store.</p>
                                    <div class="mt-4 space-y-4">
                                        <div class="flex items-center">
                                            <input wire:model.defer="status" id="status-draft" value="draft" type="radio" checked class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                            <label for="status-published" class="ml-3 block text-sm font-medium leading-6 text-gray-900">Draft</label>
                                        </div>
                                        <div class="flex items-center">
                                            <input wire:model.defer="status" id="status-published" value="published" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                            <label for="status-published" class="ml-3 block text-sm font-medium leading-6 text-gray-900">Published</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="pt-5">
            <div class="flex justify-end gap-x-3">
                <button type="button" class="rounded-md bg-white py-2 px-3 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Cancel</button>
                <button type="submit" class="inline-flex justify-center rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
        </div>
    </form>
</div>
