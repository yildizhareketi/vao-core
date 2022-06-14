<?php

namespace Atak011\VaoCore;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class VaoCoreGeolocation
{

    public function addressToGeopoint($address,$state = null,$city = null)
    {
        if (env('GOOGLE_MAPS_API_KEY')){
            $key = env('GOOGLE_MAPS_API_KEY');
        }else{
            $key = "AIzaSyBQPCaWiV4M4eYrND_7_qF12d6YqX_ZhL8";
        }
        $data = Http::get('https://maps.googleapis.com/maps/api/geocode/json?address='.$address.' '.$state.' '.$city.'&key='.$key);
        if (empty($data->json()['results'])){
            $lat = 0;
            $lon = 0;
        }else{
            $lat = $data->json()['results'][0]['geometry']['location']['lat'];
            $lon = $data->json()['results'][0]['geometry']['location']['lng'];
        }

        return ['lat' => $lat,'lon' => $lon,'geopoint' => DB::raw("(ST_GeomFromText('POINT(".$lat." ".$lon.")'))")];
    }

    public function rangeBetweenCoordinates($fromLat,$fromLon,$toLat,$toLon)
    {
        $latFrom = deg2rad($fromLat);
        $lonFrom = deg2rad($fromLon);
        $latTo = deg2rad($toLat);
        $lonTo = deg2rad($toLon);

        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
                cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
        return $angle * 6371000;
    }

}
