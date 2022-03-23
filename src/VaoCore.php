<?php

namespace Atak011\VaoCore;

class VaoCore
{

    public static function helpers(){
        return new VaoCoreHelpers();
    }

    public static function mail(){
        return new VaoCoreMail();
    }
}
