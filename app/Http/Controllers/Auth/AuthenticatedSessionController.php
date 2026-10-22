<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        if ($request->session()->has('2fa:user:id')) {
            return redirect()->route('2fa.challenge');
        }

        if (Auth::check() && ! Auth::user()->two_factor_enabled) {
            $request->session()->put('2fa:setup:user:id', Auth::id());
            $request->session()->put('2fa:setup:remember', $request->boolean('remember'));

            Auth::guard('web')->logout();
            Cookie::queue(Cookie::forget(Auth::getRecallerName()));
            $request->session()->regenerate();

            return redirect()->route('2fa.setup');
        }

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();
        Cookie::queue(Cookie::forget(Auth::getRecallerName()));

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('dashboard');
    }
}
