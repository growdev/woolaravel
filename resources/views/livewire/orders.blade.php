<div>
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <h1 class="text-base font-semibold leading-6 text-gray-900">Orders</h1>
                <p class="mt-2 text-sm text-gray-700">Most recent orders placed at this store.</p>
            </div>
        </div>
        <div class="mt-8 flow-root">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    @if ( empty( $orders ) )
                        <h1>Orders not loaded.</h1>
                    @else

                    <table class="min-w-full divide-y divide-gray-300">
                        <thead>
                        <tr>
                            <th scope="col" class="whitespace-nowrap py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Order ID</th>
                            <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Billing Name</th>
                            <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Date</th>
                            <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Items</th>
                            <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Discount</th>
                            <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Shipping</th>
                            <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Tax</th>
                            <th scope="col" class="whitespace-nowrap px-2 py-3.5 text-left text-sm font-semibold text-gray-900">Total</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">

                            @foreach ( $orders as $order )
                            <tr>
                                <td class="whitespace-nowrap py-2 pl-4 pr-3 text-sm text-gray-500 sm:pl-0"><a href="{{ $site->url }}/wp-admin/post.php?post={{ $order->id }}&action=edit" class="text-indigo-600 hover:text-indigo-900">{{ $order->id }}</a></td>
                                <td class="whitespace-nowrap px-2 py-2 text-sm font-medium text-gray-900">{{ $order->billing->first_name }} {{ $order->billing->last_name }}</td>
                                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ Illuminate\Support\Str::substr( $order->date_created, 0, 10) }}</td>
                                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">{{ count( $order->line_items) }}</td>
                                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">-${{ $order->discount_total }}</td>
                                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">${{ $order->shipping_total }}</td>
                                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">${{ $order->total_tax }}</td>
                                <td class="whitespace-nowrap px-2 py-2 text-sm text-gray-500">${{ $order->total }}</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                    @endif
                </div>
            </div>
        </div>
    </div>
    <button type="button" wire:click="getOrders" class="block rounded-md bg-indigo-600 py-1.5 px-3 text-center text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Load last 5 orders</button>
</div>
