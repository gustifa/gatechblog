<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;

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
        $id = Auth::user()->id;
        $data = User::find($id);
        $username = $data->name;
        $role = $data->role;
        $url = '';
        $userRole = $request->user()->role;
        if( $userRole == 'admin'){
            $url = 'admin/dashboard';
            $notification = array(
                'message' => 'Admin '.$username.' Login Succesfully',
                'alert-type' => 'success',
            );
            return redirect()->route('admin.dashboard')->with($notification);
        } elseif($userRole == 'agent'){
            $url = 'agent/dashboard';
            $notification = array(
                'message' => 'Agent '.$username.' Login Succesfully',
                'alert-type' => 'success',
            );
            return redirect()->route('agent.dashboard')->with($notification);
        } elseif($userRole == 'user'){
            $url = '/dashboard';
            $notification = array(
                'message' => 'User '.$username.' Login Succesfully',
                'alert-type' => 'success',
            );
            return redirect()->route('dashboard')->with($notification);
            // return redirect()->intended($url)->with($notification);
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
