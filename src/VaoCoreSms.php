<?php

namespace Atak011\VaoCore;

use Atak011\VaoCore\Libs\Sms\Netgsm;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class VaoCoreSms
{
    private $provider;

    public function __construct($provider, $credentials = null)
    {
        if (!$credentials){
            $credentials['apiKey'] = '8503085215';
            $credentials['password'] = 'N6-4D6De';
            $credentials['title'] = '8503085215';
        }
        if ($provider == 'netgsm'){
            $this->provider = new Netgsm($credentials['apiKey'],$credentials['password'],$credentials['title']);
        }


    }


    public function sendSms($phone, $text)
    {
        return $this->provider->sendSms($phone,$text);
    }


}
