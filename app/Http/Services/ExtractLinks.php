<?php
namespace App\Http\Services;

require_once 'simple_html_dom.php';

class ExtractLinks
{
    public static function handle($target)
    {
        $getHtml = file_get_html('http://osissmkn1ce.com');
        $res = [];
        foreach($getHtml->find('a') as $a) {
            if($a->href) {
                $res[] = $a->href;
            }
        }
        return response(json_encode([
            'status' => 'success',
            'target' => $target,
            'data' => $res
        ]));
    }
}
