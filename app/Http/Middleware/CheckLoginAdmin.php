<?php

namespace App\Http\Middleware;

use App\Models\UserModel;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;

class CheckLoginAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Get the cookie
        $encryptedValue = $request->cookie('TOKEN_LOGIN');

        if ($encryptedValue) {
            try {
                // Decrypt the value
                $user = UserModel::where('email', $encryptedValue)->where('role', 'admin')->first();
                // Check if value is "true"
                if ($user) {
                    return $next($request);
                }
            } catch (\Exception $e) {
                // Decryption failed
                Alert::info('Error Akun', 'Invalid Session');
                return redirect('/')->with('error', 'Invalid session');
            }
        }

        // Redirect to  if the cookie is missing or invalid
        Alert::info('Error Akun', 'Invalid Session');
        return redirect('/')->with('error', 'Unauthorized access');
    }
}
