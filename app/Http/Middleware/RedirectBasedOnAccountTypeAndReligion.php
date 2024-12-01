<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RedirectBasedOnAccountTypeAndReligion
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
            $accountType = Auth()->user()->account_type;
            $religion = Auth()->user()->religion;

            // dd($accountType, $religion);
            // Determine redirection based on account type and religion
            if ($accountType === 'provider' && $religion === 'muslim') {
                return redirect()->route('muslimProvider.dashboard');
            } elseif ($accountType === 'user' && $religion === 'muslim') {
                return redirect()->route('muslimUser.dashboard');
            } elseif ($accountType === 'provider' && $religion === 'christian') {
                return redirect()->route('christianProvider.dashboard');
            } elseif ($accountType === 'user' && $religion === 'christian') {
                return redirect()->route('christianUser.dashboard');
            }  else {
                // Handle other account types or default redirection
                return redirect()->route('dashboard');
            }
        

        // If user is not authenticated, proceed to the next middleware
        return $next($request);
    }
}