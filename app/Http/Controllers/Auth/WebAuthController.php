<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class WebAuthController extends Controller
{
    public function
    loginRoute()
    {
        return view('auth.login');
    }

    /**
     * login  user
     */
    public function Login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('api/documentation')->withSuccess('Signed in');;
        }

        return redirect("login")->withErrors('Login details are not valid');
    }

    /**
     * Register new user
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'type' => 'integer',
        ]);

        $data = [];

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = bcrypt($request->password);
        $data['type'] = $request['type'] ? $request['type']  : 0;

        $user = User::create($data);

        return redirect("login")->withSuccess('You have been registered successfully');
    }


    /**
     * Create new user
     */
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    /**
     * Return registration form
     */
    public function registrationRoute()
    {
        return view('auth.registration');
    }

    /**
     * Redirect to dashboard
     */
    public function dashboard()
    {
        if (Auth::check()) {
            return view('dashboard');
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }

    /**
     * Sign out user
     */
    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
}
