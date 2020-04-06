<?php 

namespace Atomic\Core\Auth;

use Atomic\Core\Http\Request\Request;
use Atomic\Core\Http\Response\Response;
use Atomic\Core\Http\Interfaces\Http;

class AuthEntity
{
    /**
     * @var \Atomic\Core\Http\Interfaces\Http|null
     */ 
    protected ?Http $request = null;

    /**
     * @var \Atomic\Core\Http\Interfaces\Http|null
     */ 
    protected ?Http $response = null;

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }
}