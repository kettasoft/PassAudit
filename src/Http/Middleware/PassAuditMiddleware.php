<?php

namespace Kettasoft\PassAudit\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Kettasoft\PassAudit\Http\Middleware\MiddlewareResponseHandler;

class PassAuditMiddleware extends MiddlewareResponseHandler
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        foreach ($user->passwords as $password) {
            if (Hash::check($request->password, $password->password)) {
                return (new MiddlewareResponseHandler(Config::get('passaudit.response.type')))->send();
            }
        }

        return $next($request);
    }
}
