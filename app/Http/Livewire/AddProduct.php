<?php

namespace App\Http\Livewire;

use App\Models\Site;
use Automattic\WooCommerce\Client;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class AddProduct extends Component
{
    public Site $site;
    public array $categories;

    public $name;
    public $type = 'simple';
    public $price;
    public $description;
    public $category;
    public $status = 'draft';

    public $successMessage;

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

        $args = [];

        // TODO change this Array/Objects response to Array/Arrays
        // When Livewire hydrates the data it converts it to Array/Arrays
        $this->categories = $woocommerce->get('products/categories', $args );
    }

    public function render()
    {
        return view('livewire.add-product');
    }

    public function submitForm()
    {
        $this->validate([
            'name' => 'required',
            'type' => 'required',
            'price' => 'required',
            'description' => 'required',
            'category' => 'required',
            'status' => 'required'
        ]);

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
            'name' => $this->name,
            'type' => $this->type,
            'regular_price' => $this->price,
            'price' => $this->price,
            'description' => $this->description,
            'category' => $this->category,
            'status' => $this->status,
        ];

        $result = $woocommerce->post('products', $args );

        Log::debug( 'RESULT:\n' . print_r( $result, true ) );

        $this->successMessage = 'Product added.';
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->name = '';
        $this->type = '';
        $this->price = '';
        $this->description = '';
        $this->category = '';
        $this->status = 'draft';
    }
}
