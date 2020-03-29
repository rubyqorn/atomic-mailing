<?php 

namespace Atomic\Core\Http\Response\Codes;

use Atomic\Core\Exceptions\InvalidArguments;

class CodeHandler 
{
    /**
     * List of HTTP codes handlers
     * 
     * @var array
     */ 
    private $listOfHandlers = [
        'client' => '\Atomic\Core\Http\Response\Codes\ClientErrors',
        'server' => '\Atomic\Core\Http\Response\Codes\ServerErrors',
        'info' => '\Atomic\Core\Http\Response\Codes\InformationalResponse',
        'redirect' => '\Atomic\Core\Http\Response\Codes\RedirectionResponse',
        'success' => '\Atomic\Core\Http\Response\Codes\SuccessResponse'
    ];

    /**
     * @var \Atomic\Core\Http\Interfaces\HttpCode
     */ 
    protected $handler;

    /**
     * Get instance of HTTP codes handler
     * 
     * @param string $type 
     * 
     * @return \Atomic\Core\Http\Interfaces\HttpCode
     */ 
    protected function getCodesHandlers(string $type)
    {
        foreach($this->listOfHandlers as $typeOfHandler => $handler) {
            if ($type == $typeOfHandler) {
                return $this->handler = new $handler;                
            }
        }
    }

    /**
     * Validate HTTP code 
     * 
     * @param string $type 
     * @param int $codeNumber 
     * 
     * @return string
     * @throws \Atomic\Core\Exceptions\InvalidArguments
     */ 
    public function handle(string $type, int $codeNumber)
    {
        switch ($type) {
            case 'client':
                return $this->getCodesHandlers($type)->getHeaderString($codeNumber);
            break;

            case 'server': 
                return $this->getCodesHandlers($type)->getHeaderString($codeNumber);
            break;
            
            case 'info': 
                return $this->getCodesHandlers($type)->getHeaderString($codeNumber);
            break;

            case 'redirect': 
                return $this->getCodesHandlers($type)->getHeaderString($codeNumber);
            break;

            case 'success': 
                return $this->getCodesHandlers($type)->getHeaderString($codeNumber);
            break;

            default:
                throw new InvalidArguments('Invalid type of handler');
            break;
        }
    }
}