<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\PortScan;
use Illuminate\Http\Request;
use App\Http\Services\Whois;
use App\Http\Services\GeoIP;
use App\Http\Services\ExtractLinks;
use App\Http\Services\DNSGetRecord;
use Illuminate\Support\Facades\Validator;

class ServicesController extends Controller
{
    public function Whois(Request $request)
    {
        if(Validator::make($request->all(), [
            'target' => 'required'
            ])->fails()) {
            return response(json_encode([
                'status' => 'error',
                'message' => 'Invalid request'
            ]), 400);
        }
        return Whois::handle($request->target);
    }

    public function portScan(Request $request)
    {
        if(Validator::make($request->all(), [
            'target' => 'required'
            ])->fails()) {
            return response(json_encode([
                'status' => 'error',
                'message' => 'Invalid request'
            ]), 400);
        }
        return PortScan::handle($request->target, $request->port);
    }

    // public function reverseIp(Request $request)
    // {
    //     if(Validator::make($request->all(), [
    //         'target' => 'required'
    //         ])->fails()) {
    //         return response(json_encode([
    //             'status' => 'error',
    //             'message' => 'Invalid request'
    //         ]), 400);
    //     }
    //     return ReverseIP::handle($request->target);
    // }

    public function GeoIP(Request $request)
    {
        if(Validator::make($request->all(), [
            'target' => 'required'
            ])->fails()) {
            return response(json_encode([
                'status' => 'error',
                'message' => 'Invalid request'
            ]), 400);
        }
        return GeoIP::handle($request->target);
    }

    public function extractLinks(Request $request)
    {
        if(Validator::make($request->all(), [
            'target' => 'required'
            ])->fails()) {
            return response(json_encode([
                'status' => 'error',
                'message' => 'Invalid request'
            ]), 400);
        }
        return ExtractLinks::handle($request->target);
    }

    public function dnsGetRecord(Request $request)
    {
        if(Validator::make($request->all(), [
            'target' => 'required'
            ])->fails()) {
            return response(json_encode([
                'status' => 'error',
                'message' => 'Invalid request'
            ]), 400);
        }

        Return DNSGetRecord::handle($request->target);
    }
}
