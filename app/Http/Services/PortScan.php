<?php
namespace App\Http\Services;
ini_set('max_execution_time', 0);
ini_set('memory_limit', -1);

class PortScan
{
    public $target;
    public $ports = [
        21, 22, 23, 25, 43, 53, 80, 110, 123, 143,179, 443, 465, 500, 587, 2077, 2083, 2086, 2087, 2095, 2096, 2089, 2525, 3306
    ];
    public static function handle(string $url, array $port = null)
    {
        $new = new self;
        $new->target = $url;
        return $new->BasicScan();
    }

    public function BasicScan()
    {
        $results = [];
        foreach($this->ports as $port){
            $connect = @fsockopen($this->target, $port, $errno, $errstr, 2);
            if(is_resource($connect)){
                $results[] = [
                    'port' => $port,
                    'name' => getservbyport($port, 'tcp'),
                    'status' => 'Open'
                ];
            }
        }
        return response(json_encode([
            'status' => 'success',
            'target' => $this->target,
            'data' => $results
        ]),200);
    }
}
