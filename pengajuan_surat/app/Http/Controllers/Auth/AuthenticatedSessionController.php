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
        // $request->authenticate();

        // $request->session()->regenerate();

        // return redirect()->intended(route('dashboard', absolute: false));

        // Validate the input fields
        $request->validate([
            'id' => 'required|string',
            'password' => 'required|string',
        ]);

        // Attempt to log the user in using the id and password
        if (Auth::attempt(['id' => $request->id, 'password' => $request->password])) {
            // If successful, redirect the user to their intended location
            $role = Auth::user()->role;

            if ($role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($role === 'kaprodi') {
                return redirect()->route('kaprodi.dashboard');
            } elseif ($role === 'mahasiswa') {
                return redirect()->route('mahasiswa.dashboard');
            }

            // Fallback redirect if no role matches
            return redirect()->route('home');
        }

        // If login fails, redirect back with an error
        return back()->withErrors([
            'id' => 'The provided ID and password do not match our records.',
        ]);
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
