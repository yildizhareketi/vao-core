<?php

namespace Atak011\VaoCore;

use Illuminate\Support\Facades\Http;

class VaoCoreGeolocation
{

    public function addressToGeopoint($address)
    {
        if (env('GOOGLE_MAPS_API_KEY')){
            $key = env('GOOGLE_MAPS_API_KEY');
        }else{
            $key = "AIzaSyBQPCaWiV4M4eYrND_7_qF12d6YqX_ZhL8";
        }
        $data = Http::get('https://maps.googleapis.com/maps/api/geocode/json?address='.$address.'&key='.$key);
        $lat = $data->json()['results'][0]['geometry']['location']['lat'];
        $lon = $data->json()['results'][0]['geometry']['location']['lng'];
        return ['lat' => $lat,'lon' => $lon];
    }


}
