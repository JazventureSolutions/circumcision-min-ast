<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\TotpHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
class TwoFactorController extends Controller
{
    public function showChallenge(Request $request)
    {
        if (! $request->session()->has('2fa:user:id')) {
            return redirect()->route('login');
        }

        return view('auth.two-factor-challenge');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'code' => 'required|string',
        ]);

        $userId = $request->session()->get('2fa:user:id');
        $remember = $request->session()->pull('2fa:remember', false);

        $user = User::find($userId);

        if (! $user || ! $user->two_factor_secret || ! TotpHelper::verifyCode($user->two_factor_secret, $request->input('code'))) {
            return back()->withErrors(['code' => 'The provided authentication code is invalid.']);
        }

        Auth::login($user, $remember);
        $request->session()->forget('2fa:user:id');
        $request->session()->forget('2fa:remember');
        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function showSetup(Request $request)
    {
        $user = $request->user();

        if (! $user && $request->session()->has('2fa:setup:user:id')) {
            $user = User::find($request->session()->get('2fa:setup:user:id'));
        }

        if (! $user) {
            return redirect()->route('login');
        }

        if (! $user->two_factor_secret) {
            $user->two_factor_secret = TotpHelper::generateSecret();
            $user->two_factor_enabled = false;
            $user->save();
        }

        if ($user->two_factor_enabled && $request->user()) {
            return redirect()->route('2fa.manage');
        }

        $secret = $user->two_factor_secret;

        return view('auth.two-factor-setup', [
            'secret' => $secret,
            'qrCodeUrl' => TotpHelper::getQrCodeInlineUrl($user->email, $secret),
            'enabled' => $user->two_factor_enabled,
            'manage' => false,
        ]);
    }

    public function showManage(Request $request)
    {
        $user = $request->user();

        if (! $user) {
            return redirect()->route('login');
        }

        if (! $user->two_factor_secret) {
            $user->two_factor_secret = TotpHelper::generateSecret();
            $user->two_factor_enabled = false;
            $user->save();
        }

        $secret = $user->two_factor_secret;

        return view('auth.two-factor-manage', [
            'secret' => $secret,
            'qrCodeUrl' => TotpHelper::getQrCodeInlineUrl($user->email, $secret),
            'enabled' => $user->two_factor_enabled,
        ]);
    }

    public function confirmSetup(Request $request)
    {
        $request->validate([
            'code' => 'required|string',
        ]);

        $user = $request->user();

        if (! $user && $request->session()->has('2fa:setup:user:id')) {
            $user = User::find($request->session()->get('2fa:setup:user:id'));
        }

        if (! $user || ! $user->two_factor_secret || ! TotpHelper::verifyCode($user->two_factor_secret, $request->input('code'))) {
            return back()->withErrors(['code' => 'The provided authentication code is invalid.']);
        }

        $user->two_factor_enabled = true;
        $user->save();

        $request->session()->forget('2fa:setup:user:id');
        $request->session()->forget('2fa:setup:remember');

        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return view('auth.two-factor-success', [
            'loginRoute' => route('login'),
            'waitSeconds' => 4,
        ]);
    }

    public function disable(Request $request)
    {
        $user = $request->user();
        $user->two_factor_enabled = false;
        $user->two_factor_secret = null;
        $user->save();

        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Cookie::queue(Cookie::forget(Auth::getRecallerName()));

        return redirect()->route('login')->with('status', 'Two-factor authentication has been disabled. Please log in again.');
    }
}
