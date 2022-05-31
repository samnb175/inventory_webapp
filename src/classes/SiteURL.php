<?php

class SiteURL {
    
    public function getUrl(){
        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $pos = strrpos($actual_link,"/");
        $url = substr($actual_link, 0, $pos);

        return $url;
    }

    public function getPage(){
        $pos = strrpos($_SERVER["SCRIPT_NAME"],"/");
        $page = substr($_SERVER["SCRIPT_NAME"],$pos+1);

        return $page;
    }
}