<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->only('id', 'password');
        Log::info('Login attempt with:', $credentials);

        if (Auth::attempt($credentials)) {
            Log::info('Login successful for user ID: ' . $credentials['id']);
            $request->session()->regenerate();

            return $this->authenticated($request, Auth::user());
        }

        Log::warning('Login failed for user ID: ' . $credentials['id']);
        return back()->withErrors([
            'id' => 'The provided credentials do not match our records.',
        ]);
    }
    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */

    // Redirect based on user role after login
    protected function authenticated(Request $request, $user)
    {
        if ($user->role == 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role == 'mahasiswa') {
            return redirect()->route('mahasiswa.dashboard');
        } elseif ($user->role == 'kaprodi') {
            return redirect()->route('kaprodi.dashboard');
        }

        dd($user->role); // Check if this is even being hit

        return redirect()->route('/');
    }

    public function username()
    {
        return 'id';
    }

    protected function credentials(Request $request)
{
    return [
        'id' => $request->get('id'),
        'password' => $request->get('password'),
    ];
}
}

