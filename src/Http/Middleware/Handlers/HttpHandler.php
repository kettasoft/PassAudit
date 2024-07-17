<?php

namespace Kettasoft\PassAudit\Http\Middleware\Handlers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Config;
use Kettasoft\PassAudit\Http\Middleware\MiddlewareResponseHandler;
use Kettasoft\PassAudit\Http\Middleware\Handlers\Contracts\ResponseHandlerContract;

class HttpHandler implements ResponseHandlerContract
{
    protected $content = '';
    protected $code = '';
    protected $headers = '';

    public function __construct()
    {
        $this->content = Config::get('passaudit.response.http.content');
        $this->code = Config::get('passaudit.response.http.code');
        $this->headers = Config::get('passaudit.response.http.headers');
    }

    public function send()
    {
        return new Response($this->content, $this->code, $this->headers);
    }
}
