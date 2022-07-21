<?php

namespace App\Http\Services;

class DNSGetRecord
{
    public static function handle($target)
    {
        $result = dns_get_record($target, DNS_ANY, $authns, $addtl);
        if(!empty($result)) {
            return response(json_encode([
                'status' => 'success',
                'target' => $target,
                'data' => $result
            ]));
        } else {
            return response(json_encode([
                'status' => 'error',
                'message' => 'Invalid request'
            ]), 400);
        }
    }
}

