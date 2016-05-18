<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Services\Status;

class IsAdmin {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $request->user();

        if (Auth::user() && $user->role->slug == 'admin') {
            return $next($request);
        }

        flash()->success('You don\'t have permission to access this page' );

        return redirect()->back();

    }


}
