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
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.netgsm.com.tr/sms/send/get',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array('usercode' => $this->apiKey,'password' => $this->password,'gsmno' => $phone,'message' => $text,'msgheader' => $this->title),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return str_starts_with($response,00);
    }


}
