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

    public static function notification($provider= null,$credentials = null){
        return new VaoCoreNotification($provider,$credentials = null);
    }

    public static function file(){
        return new VaoCoreFile();
    }

    public static function geolocation(){
        return new VaoCoreGeolocation();
    }

    public static function sms($provider, $credentials = null){
        return new VaoCoreSms($provider, $credentials);
    }

}
