<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;

class Connect extends Controller
{
    /**
     * Handle callback from OAuth to site and store info.
     *
     * @param Request $request
     * @param Site    $site
     */
    public function store(Request $request, Site $site)
    {
        $validated = $request->validate([
            'key_id' => 'required',
            'user_id' => 'required',
            'consumer_key' => 'required',
            'consumer_secret' => 'required',
            'key_permissions' => 'required',
        ]);

        $validated['consumer_key'] = Crypt::encryptString( $validated['consumer_key']);
        $validated['consumer_secret'] = Crypt::encryptString( $validated['consumer_secret']);
        $validated['token'] = '';
        $validated['status'] = 'active';
        unset( $validated['user_id'] );

        $site->update($validated);
    }

}
