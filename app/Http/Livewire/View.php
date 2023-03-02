<?php

namespace App\Http\Livewire;

use App\Models\Site;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class View extends Component
{
    public Site $site;

    public function render()
    {
        return view('livewire.view');
    }
}
