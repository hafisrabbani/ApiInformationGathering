<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'ApiAuth',
    'prefix' => 'tools'
], function () {
    Route::post('/whois',[App\Http\Controllers\Api\ServicesController::class, 'Whois'])->name('api.whois');
    Route::post('/port-scan',[App\Http\Controllers\Api\ServicesController::class, 'portScan'])->name('api.portScan');
    Route::post('/geoip',[App\Http\Controllers\Api\ServicesController::class, 'GeoIP'])->name('api.geoip');
    Route::post('/extract-links',[App\Http\Controllers\Api\ServicesController::class, 'extractLinks'])->name('api.extractLinks');
    Route::post('/dns-get-record',[App\Http\Controllers\Api\ServicesController::class, 'dnsGetRecord'])->name('api.dnsGetRecord');
});
