<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Redirect after registration
     */
    protected $redirectTo = '/my-account';

    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Validation
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create new user
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'user', // ⭐ IMPORTANT ADD
        ]);
    }

    /**
     * AFTER REGISTER REDIRECT LOGIC (OVERRIDE)
     */
    protected function registered($request, $user)
    {
        if ($user->role === 'admin') {
            return redirect('/admin/dashboard');
        }

        return redirect('/my-account');
    }
}