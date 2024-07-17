<?php

namespace Kettasoft\PassAudit\Http\Middleware\Handlers\Contracts;

interface ResponseHandlerContract
{
    public function __construct();
    public function send();
}
