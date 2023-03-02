<?php

namespace App\Http\Livewire;

use App\Models\Site;
use Automattic\WooCommerce\Client;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Orders extends Component
{

    public Site $site;
    public array $orders;


    public function getOrders()
    {
        $woocommerce = new Client(
            $this->site->url,
            $this->site->getConsumerKey(),
            $this->site->getConsumerSecret(),
            [
                'version' => 'wc/v3',
                'verify_ssl' => false
            ]
        );

        $args = [
            'per_page' => 5,
        ];

        $this->orders = $woocommerce->get('orders', $args );

    }

    public function render()
    {
        return view('livewire.orders');
    }
}
