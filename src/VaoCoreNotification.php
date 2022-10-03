<?php

namespace Atak011\VaoCore;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;

class VaoCoreNotification
{
    private $provider;
    /**
     * @var null
     */
    private $credentials;

    public function __construct( $provider = null, $credentials = null)
    {
        $this->provider = $provider;
        $this->credentials = $credentials;
    }


    public function toastNotification($type = 'success', $text = 'Başarılı')
    {
        Session::flash('notification', $text);

    }

    public function push($provider,$to,$title,$text){
        Http::post('https://exp.host/--/api/v2/push/send',[
            'to' => $to,
            'title' => $title,
            'body' => $text
        ]);
    }


}
