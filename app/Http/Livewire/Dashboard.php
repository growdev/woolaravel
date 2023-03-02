<?php

namespace App\Http\Livewire;

use App\Models\Site;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.dashboard', [
            'sites' => Site::paginate(3),
        ]);
    }
}
