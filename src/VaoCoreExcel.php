<?php

namespace Atak011\VaoCore;

use stdClass;
use Maatwebsite\Excel\Facades\Excel;

class VaoCoreExcel
{

    public function toArray($file)
    {
        return Excel::toArray(new stdClass(),$file);
    }


}
