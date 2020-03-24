<?php

namespace App\Http\Middleware;

use App\Model\ApiUser;
use Closure;

class Login
{
    public function handle($request, Closure $next)
    {
        header('Access-Control-Allow-Origin:*');



        return $next($request);
    }
}
