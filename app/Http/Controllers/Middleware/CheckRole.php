<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!in_array(auth()->user()->role, $roles)) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }

    public function __construct()
    {
    $this->middleware(function ($request, $next) {
        $user = auth()->user();
        $allowedRoles = ['Admin', 'HCM Employees']; // hanya 2 role ini boleh CRUD

        if (!in_array($user->role, $allowedRoles)) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    });
    }
}
