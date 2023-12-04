<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            Order history
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Review and track your purchases effortlessly with our Order History.') }}
        </p>
    </header>
    @if($orders)
    @foreach($orders as $order)
    <div class="mt-4 bg-white text-black p-4 sm:p-8 shadow sm:rounded-lg">
        <table class="w-full">
            <thead>
                <tr>
                    <th colspan="2" class="text-end">
                        {{ __('Date') }}: {{ $order->created_at->format('d-m-Y') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->order_items as $item)
                    <tr>
                        <td>
                            {{ $item['name'] }}
                        </td>
                        <td class="text-end">
                            {{ $item['price'] }} kr
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td>
                        {{ __('Total') }}
                    </td>
                    <td class="text-end">
                        {{ $order->total_price }} kr
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @endforeach
    @else
        <div class="mt-4 bg-white text-black p-4 sm:p-8 shadow sm:rounded-lg">
            <p class="text-center">{{ __('No orders found.') }}</p>
            <h1>Hello</h1>
        </div>
    @endif 
</section>