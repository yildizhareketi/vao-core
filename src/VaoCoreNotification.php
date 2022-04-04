<?php

namespace Atak011\VaoCore;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class VaoCoreNotification
{

    public function toastNotification($type = 'success', $text = 'Başarılı')
    {
        Session::flash('notification',$text);

    }


}
