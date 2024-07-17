<?php

namespace Kettasoft\PassAudit\Http\Middleware;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Kettasoft\PassAudit\Http\Middleware\Handlers\HttpHandler;

use function PHPSTORM_META\type;

class MiddlewareResponseHandler
{
    protected array $mapResponses = [
        'http' => HttpHandler::class,
        'api' => ApiHandler::class
    ];

    protected $type;

    public function __construct($type)
    {
        $this->type = $type;
    }

    public function send()
    {
        if (array_key_exists($this->type, $this->mapResponses)) {
            $handler = new $this->mapResponses[$this->type];
            return $handler->send();
        }
    }
}
