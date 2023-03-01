<?php

namespace App\Models;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Site extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','name','url','status'];

    public function getApiKey()
    {
        if ( empty( $this->api_key ) ){
            return null;
        }

        try{
            return Crypt::decryptString( $this->api_key );
        } catch ( DecryptException $e ){
            Log::error( 'Unable to decrypt API key.' );
            Log::error( $e->getMessage() );

            return null;
        }
    }

    public function getApiSecret()
    {
        if ( empty( $this->api_secret ) ){
            return null;
        }

        try{
            return Crypt::decryptString( $this->api_secret );
        } catch ( DecryptException $e ){
            Log::error( 'Unable to decrypt API secret.' );
            Log::error( $e->getMessage() );

            return null;
        }
    }

}
