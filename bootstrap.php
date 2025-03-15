<?php
use core\Container;
use core\Database;
use core\App ;

$container = new Container();

$container->bind('core\Database', function(){

    
    $config = require "config.php";
    return new Database($config['database'],$config['database']['username'],$config['database']['password']);
    
});

App::setContainer($container);