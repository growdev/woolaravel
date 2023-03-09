<?php

namespace App\Http\Livewire;

use App\Models\Site;
use Automattic\WooCommerce\Client;
use Livewire\Component;

class Products extends Component
{
    public Site $site;
    public array $products;

    public function mount()
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
            'per_page' => 40,
        ];


        $this->products = convert_array( $woocommerce->get('products', $args ) );

    }

    public function deleteProduct( $id )
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

        $result = $woocommerce->delete('products/'. $id);
        // TODO store result

        // Refresh products from API
        $args = [
            'per_page' => 40,
        ];
        $this->products = convert_array( $woocommerce->get('products', $args ) );
        session()->flash('message', 'Product ' . $id . ' deleted.' );
    }

    public function render()
    {
        return view('livewire.products');
    }
}
