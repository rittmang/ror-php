<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function fixBrokenUrls($url, $origin){
        if(!parse_url($url,PHP_URL_HOST)){
            $url = env($origin) . $url;
        }
        else{
            $host = strtolower(parse_url($url,PHP_URL_HOST)) . '/';
            $url = str_ireplace('https://' . $host,env($origin),$url);
        }

        if (strpos($url, 'file') !== false && $origin === 'VIDEO_ORIGIN') {
            $url = str_replace('/file/Muvibay/', '/', $url);
        }

        return $url;
    }
}
