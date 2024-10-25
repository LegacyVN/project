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
    // public function store(LoginRequest $request): RedirectResponse
    // {
    //     $request->authenticate();

    //     $request->session()->regenerate();

    //     if($request->user()->usertype === 'admin') //if usertype is admin then return view admin. remember to create route view and controller first
    //     {
    //         return redirect('admin/dashboard');
    //     }

    //     return redirect()->intended(route('dashboard'));
    // }


    public function store(LoginRequest $request): RedirectResponse
    {
        // Attempt to authenticate the user
        $request->authenticate();
    
        // Retrieve the authenticated user
        $user = $request->user();
    
        // Check if user_status is 1
        if ($user->user_status !== 1) {
            // Log the user out and redirect with an error message
            Auth::guard('web')->logout();
            return redirect()->back()->withErrors(['user_status' => 'Access denied. Please contact us via email for help.']);
        }
    
        // Regenerate session for the authenticated user
        $request->session()->regenerate();
    
        // Check user type and redirect accordingly
        if ($user->usertype === 'admin') {
            return redirect('admin/dashboard');
        }
    
        return redirect()->intended(route('dashboard'));
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
