<?php

namespace App\Http\Middleware;

use App\Http\Responses\ApiResponse;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;



class EnsureUserHasRoleAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function handle(Request $request, Closure $next)
    {
        /** @var $user User  */

        $user = auth()->user();
        if (!($user->role_id == User::ROLE_ADMIN) ){
            return ApiResponse::response(403, 'Forbidden');

        }

        return $next($request);
    }
}
