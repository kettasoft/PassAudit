<?php

namespace Kettasoft\PassAudit\Http\Middleware\Handlers;

use Kettasoft\PassAudit\Http\Middleware\Handlers\Contracts\ResponseHandlerContract;
use Monolog\Handler\HandlerInterface;

class ApiHandler implements ResponseHandlerContract
{
    public function __construct()
    {
    }

    public function send()
    {
    }
}
