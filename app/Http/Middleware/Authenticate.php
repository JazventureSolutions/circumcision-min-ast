<?php



namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class Authenticate extends Middleware
{
    public function handle($request, \Closure $next, ...$guards)
    {
        foreach (empty($guards) ? [null] : $guards as $guard) {
            $authenticatedUser = Auth::guard($guard)->user();

            if (! $authenticatedUser) {
                continue;
            }

            if ((int) $request->session()->get('mfa:verified:user:id') !== (int) $authenticatedUser->id) {
                Auth::guard($guard)->logout();
                Cookie::queue(Cookie::forget(Auth::getRecallerName()));
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                if ($request->expectsJson()) {
                    return response()->json(['message' => 'Unauthenticated.'], 401);
                }

                return redirect()->route('login');
            }
        }

        return parent::handle($request, $next, ...$guards);
    }

    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}

