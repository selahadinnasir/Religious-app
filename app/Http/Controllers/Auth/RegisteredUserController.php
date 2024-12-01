<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'account_type' => ['required', 'string', 'in:provider,user'],
        'religion' => ['required', 'string', 'in:muslim,christian'],
        'dob' => ['required', 'date'],
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'account_type' => $request->account_type,
        'religion' => $request->religion,
        'dob' => $request->dob,
    ]);

        event(new Registered($user));

        Auth::login($user);

        $user = Auth::user();
       $accountType = $user->account_type;
       $religion = $user->religion;

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
}
