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
use Atomic\Core\Http\Request\Request;
use Atomic\Core\Http\Response\Response;
use Atomic\Core\Http\HttpUser;

$app = new App();
$app->runLocalServer();

$request = new Response('http://phillton.000webhostapp.com');
$user = new HttpUser($request);

echo '<pre>';
print_r($user);
echo '</pre>';
