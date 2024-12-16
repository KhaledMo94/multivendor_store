<?php

namespace App\Services\Paypal;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class Authenticate
{
    public $client;
    public $secret;
    public $url;
    public $token;

    public function __construct()
    {
        if(config('services.paypal.mode') == 'sandbox'){
            $this->client = config('services.paypal.sandbox.client_id');
            $this->secret = config('services.paypal.sandbox.client_secret');
            $this->token = Cache::get('paypal_sandbox_access_token');
        }else{
            $this->client = config('services.paypal.live.client_id');
            $this->secret = config('services.paypal.live.client_secret');
            $this->token = Cache::get('paypal_live_access_token');
        }
    }

    public function getAccessToken()
    {
        if(! $this->token){

            $response = Http::asForm()->withBasicAuth($this->client , $this->secret)
            ->post("https://api-m.sandbox.paypal.com/v1/oauth2/token",[
                'grant_type'                =>'client_credentials'
            ]);

            if($response->successful()){
                $this->token = $response->json()['access_token'];
                $expired = $response->json()['expires_in'];
                Cache::put('paypal_sandbox_access_token',$this->token , $expired - 300);
            }else{
                throw new \Exception('Failed to fetch PayPal access token.');
            }
        }
        return $this->token;
    }
}
