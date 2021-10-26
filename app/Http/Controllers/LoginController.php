<?php

namespace App\Http\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use Illuminate\Database\QueryException;

class LoginController extends Controller
{
    //
    function loginForm() 
    {
        return view('login-form');
    }

    function registerForm(){
        return view('register-form');
    }

    function register(Request $request)
    {  
        try{
            $user = User::create($request->getParsedBody());
            return redirect()->route('admin.user')
            ->with('status', "User {$user->email} was created.");       
                // ... Normal process
            } catch(QueryException$excp) {
                return redirect()->back()->withInput()->withErrors([
                    'error' => $excp->errorInfo[2],
                ]);
            }
    }
    function logout() 
    {
        Auth::logout();
        session()->invalidate();
        // regenerate CSRF token
        session()->regenerateToken();
        return redirect()->route('login');
    }

    function authenticate(Request $request) 
    {
        // get credentials from user.
        $data= $request->getParsedBody();
        $credentials= [
            'email' => $data['email'],
        'password' => $data['password'],
        ];

        // authenticate by using method attempt()
        if(Auth::attempt($credentials)) 
        {
            // regenerate the new session ID
            session()->regenerate();
            // redirect to the requested URL or
            // to route product-list if does not specify
            return redirect()->intended(route('product.list'))->with('status' ,'Login successfully');
        }

        // if cannot authenticate redirect back to loginFormwith error message.
        return redirect()->back()->withErrors([
            'credentials' => 'The provided credentials do not match our records.',
        ]);
    }

    
    public function __construct()
    {
        $this->middleware(function($request,$next){
            if (session('success')) {
                Alert::success(session('success'));
            }

            if (session('error')) {
                Alert::error(session('error'));
            }

            return $next($request);
        });
    }
}
