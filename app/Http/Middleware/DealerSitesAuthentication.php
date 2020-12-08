<?php

namespace App\Http\Middleware;

use Closure;

class DealerSitesAuthentication
{
    
    public function handle ($request, Closure $next)
    {
        if ($this->checkIfTokenInRequestExists($request) && $this->checkIfTokenInRequestIsValid($request)) {
            return $next($request);
        } else {
            return response(['message' => 'Bad Request!'], 400);
        }
    }

    private function checkIfTokenInRequestExists ($request) {
        return $request->header('token') !== null;
    }

    private function checkIfTokenInRequestIsValid ($request) {
        return $request->header('token') === 'c7d44474-a444-4783-9fdc-f8a8fcf575ba';
    }

}