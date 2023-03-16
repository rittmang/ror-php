<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function fixBrokenUrls($url){
        if(!parse_url($url,PHP_URL_HOST)){
            $url = env('IMAGE_ORIGIN') . $url;
        }
        else{
            $host = strtolower(parse_url($url,PHP_URL_HOST)) . '/';
            $url = str_ireplace('https://' . $host,env('IMAGE_ORIGIN'),$url);
        }
        return $url;
    }
}
