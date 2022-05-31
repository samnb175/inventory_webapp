<?php

spl_autoload_register('autoload');

function autoload($className) {
    foreach(glob(__DIR__ . '/*', GLOB_ONLYDIR) as $dir) {
        if(file_exists("$dir/" . $className . ".php")) {
            require_once "$dir/" . $className . ".php";
            break;
        }
    }
}