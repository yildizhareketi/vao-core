<?php

namespace Atak011\VaoCore;

use Illuminate\Support\Facades\Mail;

class VaoCoreFile
{

    public function excel()
    {
        return new VaoCoreExcel();
    }


}
