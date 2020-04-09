<?php 

namespace Atomic\Application\Models;

use Manipulator\DatabaseManager;
use Manipulator\Connector;

class Model extends DatabaseManager
{
    public function __construct()
    {
        return new Connector();
    }
}