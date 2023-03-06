<div>
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-base font-semibold leading-6 text-gray-900">Orders</h1>
                <p class="mt-2 text-sm text-gray-700">All Products on the store.</p>
            </div>
        </div>
        <div class="mt-8 flow-root">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-f+ull py-2 align-middle sm:px-6 lg:px-8">
                    @if ( empty( $products ) )
                        <h1>Products not loaded.</h1>
                    @else

                        <table class="min-w-full divide-y divide-gray-300">
                            <thead>
                            <tr>
                                <th scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Product ID</th>
                                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Name</th>
                                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Date Created</th>
                                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Type</th>
                                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Status</th>
                                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Price</th>
                                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">SKU</th>
                                <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Action</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">

                            @foreach ( $products as $product )
                                <tr>
                                    <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-0"><a href="{{ $site->url }}/wp-admin/post.php?post={{ $product->id }}&action=edit" class="text-indigo-600 hover:text-indigo-900">{{ $product->id }}</a></td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{ $product->name }}</td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ Illuminate\Support\Str::substr( $product->date_created, 0, 10) }}</td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ $product->type }}</td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ $product->status }}</td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">${{ $product->price }}</td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ $product->sku }}</td>
                                    <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">Delete</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        <hr/>
                        <p class="my-10">{{ count( $products) }} products.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
