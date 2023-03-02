<div>
    <div class="mt-8 flow-root">
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead>
                    <tr>
                        <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-0">Name</th>
                        <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">URL</th>
                        <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Status</th>
                        <th scope="col" class="py-3.5 px-3 text-left text-sm font-semibold text-gray-900">Orders</th>
                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                            <span class="sr-only">View</span>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">

                    @foreach ( $sites as $site )
                        <tr>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">{{ $site->name }}</td>
                            <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">{{ $site->url }}</td>
                            <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">
                                @if ($site->status === 'active')
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        {{ Illuminate\Support\Str::title( $site->status ) }}
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium leading-4 bg-red-100 text-red-800">
                                        {{ Illuminate\Support\Str::title( $site->status ) }}
                                    </span>
                                @endif
                            </td>
                            <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">23,456</td>
                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                <a href="/view/{{ $site->id }}" class="text-indigo-600 hover:text-indigo-900">View<span class="sr-only">, {{ $site->name }}p</span></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $sites->links() }}
            </div>
        </div>
    </div>
</div>
