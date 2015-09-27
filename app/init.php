<?php
define('ROOT',dirname(__DIR__));


define('APP',ROOT."/app/");


define('CSS',ROOT."/public/css/");


require_once ROOT.'/vendor/autoload.php';
require_once APP.'/core/App.php';
require_once APP.'/database.php';
require_once APP.'/core/components/Auth.php';
require_once APP.'/core/helpers/html.php';
require_once APP."/core/Controller.php";




//define('ROOT',dirname(__FILENAME__));
