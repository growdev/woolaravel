<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Connect extends Component
{
    public string $url;

    protected $rules = [
        'url' => 'required|url',
    ];

    public function render()
    {
        return view('livewire.connect');
    }

    public function goToSite(){

        $this->validate();

        $user_id = auth()->user()->getAuthIdentifier();
        $app_url = config('app.url');

        // Build string
        $string = '/wc-auth/v1/authorize?' .
            'app_name=' . urlencode(config('app.name') ). '&' .
            'scope=read_write&' .
            'user_id=' . $user_id . '&' .
            'return_url=' . $app_url . '/dashboard&' .
            'callback_url=' . $app_url . '/keys';
        $url = $this->url . '/' . $string;

        Log::info('Trying URL: ' . $url );

        redirect( $url );
    }

    public function back(){
        return $this->redirectRoute('dashboard');
    }
}
