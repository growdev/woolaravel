<?php

namespace App\Http\Livewire;

use App\Models\Site;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Livewire\Component;

class Connect extends Component
{
    public string $name;

    public string $url;

    protected $rules = [
        'name' => 'required',
        'url' => 'required|url',
    ];

    public function render()
    {
        return view('livewire.connect');
    }

    public function goToSite()
    {

        $this->validate();

        // Save attempt as a new site.
        $site['token'] = Str::random();
        $site['user_id'] = auth()->user()->getAuthIdentifier();
        $site['name'] = $this->name;
        $site['url']  = $this->url;
        $site['status'] = 'pending';

        Site::firstOrCreate( $site );

        $app_url = config('app.url');

        // Build string
        $string = '/wc-auth/v1/authorize?' .
            'app_name=' . urlencode(config('app.name') ). '&' .
            'scope=read_write&' .
            'user_id=' . $site['user_id'] . '&' .
            'return_url=' . $app_url . '/dashboard&' .
            'callback_url=' . $app_url . '/keys/' . $site['token'];
        $url = $this->url . '/' . $string;

        redirect( $url );
    }

    public function back()
    {
        $this->redirectRoute('dashboard');
    }
}
