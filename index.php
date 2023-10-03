<?php 
define('APP_PATH', __DIR__);

// autoloader is needed for booting files from vendor and using namespaces
// as it points to root folder App
require_once APP_PATH . '/vendor/autoload.php';

use App\App;

$app = new App();

$app->run();