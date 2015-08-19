<?php

function __autoload($className) {
    $className = explode('\\', $className);
    $className = $className[sizeof($className) - 1];
    if (file_exists('app/core/' . $className . '.php')) {
        require_once('app/core/' . $className . '.php');
    }
    $className = strtolower($className);
    if (file_exists('app/controllers/' . $className . '.php')) {
        require_once 'app/controllers/' . $className . '.php';
    }
    if (file_exists('app/models/' . $className . '.mdl.php')) {
        require_once 'app/models/' . $className . '.php';
    }
}


define('LSForumFramework', true);

Router::error(function(){
    echo "ERROR";
});

Router::any('user/(:num)', function ($slug) {
    var_dump(get_defined_vars());
    echo "NUMBER";
});

Router::any('user/(:alpnum)', function($slug){
    var_dump(get_defined_vars());
});

Router::dispatch();
