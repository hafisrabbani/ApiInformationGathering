<?php
namespace App\Http\Services;
use Iodev\Whois\Factory;

class Whois
{
    public static function handle($url)
    {
        $data = Factory::get()->createWhois();
        return response(json_encode([
            'status' => 'success',
            'target' => $url,
            'data' => $data->lookupDomain($url)->text
        ]));
    }
}
