<?php
namespace App\Http\Services;
use Illuminate\Support\Facades\Http;

class GeoIP
{
    public static function handle($target)
    {
        $targetIP = gethostbyname($target);
        $sendRequest = Http::get('http://ipinfo.io/'.$targetIP.'/json');
        $temp = json_decode($sendRequest,true);
        $result = [
            'status' => 'success',
            'target' => $target,
            'data' => [
                'ip' => $temp['ip'],
                'hostname' => $temp['hostname'],
                'city' => $temp['city'],
                'region' => $temp['region'],
                'country' => $temp['country'],
                'loc' => $temp['loc'],
                'org' => $temp['org'],
                'postal' => $temp['postal'],
                'timezone' => $temp['timezone'],
            ]
        ];
        return response($result,200);
    }
}
