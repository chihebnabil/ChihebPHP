<?php

declare(strict_types=1);

define('ROOT', dirname(__DIR__));
define('APP', ROOT.'/app/');
define('WEBROOT', "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/");
define('CSS', WEBROOT."css/");
define('IMG', WEBROOT."img/");
define('JS', WEBROOT."js/");

require_once ROOT.'/vendor/autoload.php';

// Load environment variables
(new \Symfony\Component\Dotenv\Dotenv())->load(ROOT.'/.env');

// Initialize error handling
error_reporting(E_ALL);
ini_set('display_errors', $_ENV['APP_DEBUG'] ?? '0');

// Start session
session_start();

// Load core components
require_once APP.'/core/App.php';
require_once APP.'/database.php';
require_once APP.'/core/components/Auth.php';
require_once APP.'/core/helpers/html.php';
require_once APP.'/core/helpers/http.php';
require_once APP."/core/Controller.php";
