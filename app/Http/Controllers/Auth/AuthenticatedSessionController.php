<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Determine account type of the authenticated user
    $user = Auth::user();
    $accountType = $user->account_type;
    $religion = $user->religion;

    // Redirect based on account type
    if ($accountType === 'provider' && $religion === 'muslim') {
        return redirect()->route('muslimProvider.dashboard');
    } elseif ($accountType === 'user' && $religion === 'muslim') {
        return redirect()->route('muslimUser.dashboard');
    } elseif ($accountType === 'provider' && $religion === 'christian') {
        return redirect()->route('christianProvider.dashboard');
    } elseif ($accountType === 'user' && $religion === 'christian') {
        return redirect()->route('christianUser.dashboard');
    } elseif ($accountType === 'provider') {
        return redirect()->route('provider.dashboard');
    } elseif ($accountType === 'user') {
        return redirect()->route('user.dashboard');
    } else {
        // Handle other account types or default redirection
        return redirect()->route('dashboard');
    }
    
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
