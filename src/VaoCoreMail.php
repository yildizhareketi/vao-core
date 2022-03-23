<?php

namespace Atak011\VaoCore;

use Illuminate\Support\Facades\Mail;

class VaoCoreMail
{

    public function send($to, $subject, $text)
    {
        return Mail::raw($text, function ($message) use ($to, $subject) {
            $message->to($to)
                ->subject($subject);
        });
    }


}
