<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\userTables;
use App\Models\adminTables;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        // Debug statement to check the credentials being used
         var_dump($credentials);
    
        if (Auth::guard('userTables')->attempt($credentials)) {
            // Debug statement to check if authentication was successful
            // echo "User authentication successful";
            return redirect()->route('user_home');
        } else {
            // Debug statement to check if authentication failed
            // echo "User authentication failed";
            return redirect()->route('auth.user_login')->with('error', 'Invalid email or password');
        }
    }
    
    
    public function adminAuthenticate(Request $request)
    {
        $adminCredentials = $request->only('email', 'password');
    
        // Debug statement to check the credentials being used
       
        if (Auth::guard('adminTables')->attempt($adminCredentials)) {
        
            return redirect()->route('home');
        } else {
            return redirect()->route('auth.admin_login')->with('error', 'Invalid email or password');
        }
    }
    
}
