<?php

namespace Atak011\VaoCore\Libs\Sms;

use Illuminate\Support\Facades\Http;

class Netgsm
{

    private $apiKey;
    private $password;
    private $title;

    public function __construct($apiKey,$password,$title)
    {
        $this->apiKey = $apiKey;
        $this->password = $password;
        $this->title = $title;
    }

    public function sendSms($phone, $text)
    {

        $response = Http::get('https://api.netgsm.com.tr/sms/send/get/',['usercode' => $this->apiKey,'password' => $this->password,'msgheader' => $this->title,'message'=> $text,'gsmno' => $phone]);
        return $response->successful();
    }


}
