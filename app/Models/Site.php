<?php

namespace App\Models;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;

class Site extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','name','url','status','consumer_key','consumer_secret','key_id','key_permissions','token'];

    public function getConsumerKey()
    {
        if ( empty( $this->consumer_key ) ){
            return null;
        }

        try{
            return Crypt::decryptString( $this->consumer_key );
        } catch ( DecryptException $e ){
            Log::error( 'Unable to decrypt consumer key.' . $e->getMessage() );
            return null;
        }
    }

    public function getConsumerSecret()
    {
        if ( empty( $this->consumer_secret ) ){
            return null;
        }

        try{
            return Crypt::decryptString( $this->consumer_secret );
        } catch ( DecryptException $e ){
            Log::error( 'Unable to decrypt consumer secret.' . $e->getMessage() );
            return null;
        }
    }

}
