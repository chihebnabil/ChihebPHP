<?php
define('ROOT',dirname(__DIR__));


define('APP',ROOT."/app/");
define('WEBROOT',"http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/");


define('CSS',WEBROOT."css/");
define('IMG',WEBROOT."img/");
define('JS',WEBROOT."js/");
define('DS',ROOT."/");


require_once ROOT.'/vendor/autoload.php';
require_once APP.'/core/App.php';
require_once APP.'/database.php';
require_once APP.'/core/components/Auth.php';
require_once APP.'/core/helpers/html.php';
require_once APP.'/core/helpers/http.php';
require_once APP."/core/Controller.php";
