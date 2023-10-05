<?php

//load config
require_once 'config/config.php';

//load libraries manually
// require_once 'libraries/core.php';
// require_once 'libraries/Controller.php';
// require_once 'libraries/Database.php';

//autoload core libraries
spl_autoload_register(function($className){
    require_once 'libraries/'.$className.'.php';
});