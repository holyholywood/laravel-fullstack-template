<?php

namespace App\Modules\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Modules\Auth\Requests\LoginRequest;
use App\Modules\Auth\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth_login');
    }
    public function login(Request $request)
    {
        $context = [
            "title" => "Login"
        ];

        if ($errors = session('errors')) {
            $context['err_message'] = "Validation Error";
        }

        return view('auth.login', $context);
    }

    public function loginUser(LoginRequest $request)
    {
        $context = [
            "title" => "Login"
        ];
        if (Auth::attempt($request->validated())) {
            $request->session()->regenerate();
            return redirect()->route('customer_index');
        }
        return view('auth.login', $context);
    }

    public function register(Request $request)
    {
        $context = [
            "title" => "Register"
        ];

        return view('auth.register', $context);
    }

    public function registerUser(RegisterRequest $request)
    {
        try {
            $data = $request->validated();
            $user = User::create(['name' => $data['fullname'], 'email' => $data['email'], 'password' => Hash::make($data['password'])]);
            $role = Role::where(['name' => env('DEFAULT_USER_ROLE_NAME', 'DEFAULT')])->first();
            $user->assignRole($role);
            Session::flash('success_message', 'Register success. Login to continue!');
            return redirect()->route('auth_login');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
