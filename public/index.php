<?php 

// Check if autoload file exists 
function autoloader()
{
    if (file_exists('../vendor/autoload.php')) {
        return require '../vendor/autoload.php';
    }
}

autoloader();

use Atomic\Core\App\App;

$app = new App();
$app->runLocalServer();

